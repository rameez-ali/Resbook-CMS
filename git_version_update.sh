#!/bin/bash

# Script start
echo "Script started."

# Extract the current version from config.php
CURRENT_VERSION=$(awk -F"'" '/define\(.*VERSION/ {print $(NF-1)}' utility/config.php)
echo "Current version: $CURRENT_VERSION"

# Increment the version number
IFS='.' read -ra VERSION_PARTS <<< "$CURRENT_VERSION"
NEW_VERSION="${VERSION_PARTS[0]}.${VERSION_PARTS[1]}.$(( ${VERSION_PARTS[2]} + 1 ))"
echo "New version: $NEW_VERSION"

# Update utility/config.php with the new version
sed -i.bak "s/define('VERSION', '$CURRENT_VERSION')/define('VERSION', '$NEW_VERSION')/" utility/config.php
rm utility/config.php.bak

echo "Updated config file."

# Update README.md with commit details
# Fetching last 20 commits
COMMITS=$(git log --oneline -n 20)

IFS=$'\n' # setting newline as delimiter for reading lines
for COMMIT in $COMMITS; do
    COMMIT_HASH=$(echo $COMMIT | awk '{print $1}')
    COMMIT_MESSAGE=$(echo $COMMIT | cut -d' ' -f2-)
    
    # Check if this commit is already in the README.md
    if ! grep -q $COMMIT_HASH README.md; then
        # Check if this version header exists in README.md
        if ! grep -q "### $NEW_VERSION" README.md; then
            # If the header for this version doesn't exist, add it
            echo -e "### $NEW_VERSION\n" >> README.md
        fi
        echo "- $COMMIT_MESSAGE ($COMMIT_HASH)" >> README.md
    fi
done

echo "Updated README with commits."

# Script finished
echo "Script finished."

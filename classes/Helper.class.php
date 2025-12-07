
<?php

/**
 * Class Helper
 *
 * @author Talwinder Singh <talwindersingh8@gmail.com>
 */

class Helper
{
    /**
     * Get current datetime object.
     *
     * @return object
     */
    public static function getCurrentDateTime()
    {
        return new DateTime();
    }

    /**
     * Get current datetime string.
     *
     * @param string $format
     * @return string
     */
    public static function getCurrentDateTimeStr($format = "Y-m-d H:i:s")
    {
        $objDateTime = self::getCurrentDateTime();

        return $objDateTime->format($format);
    }

    /**
     * Get datetime string.
     *
     * @param string $date
     * @param string $format
     * @return string
     */
    public static function getDateTimeStr($date, $format = "d M Y h:i:s A")
    {
        $objDateTime = new DateTime($date);

        return $objDateTime->format($format); 
    }

    /**
     * Formate Date
     *
     * @param string $date
     * @param string $oldFormat
     * @param string $newFormat
     * @return string
     */
    public static function formateDate(
        $date,
        $newFormat = "Y-m-d",
        $oldFormat = "d/m/Y"
    ) {
        $objDateTime = DateTime::createFromFormat($oldFormat, $date);

        return $objDateTime->format($newFormat);
    }

    /**
     * Formate Date Range
     *
     * @param string $startDate
     * @param string $endDate
     * @return string
     */
    public static function formateDateRange($startDate, $endDate)
    {
        $objCurrentDate = new DateTime();
        $objStartDate = new DateTime($startDate);
        $objEndDate = new DateTime($endDate);

        $objCurrentDate->setTime(0, 0, 0);
        $objStartDate->setTime(0, 0, 0);
        $objEndDate->setTime(0, 0, 0);

        $startMonthYear = $objStartDate->format("m Y");
        $endMonthYear = $objEndDate->format("m Y");
        $objCurrentDate->format("m Y");

        $startYear = $objStartDate->format("Y");
        $endYear = $objEndDate->format("Y");

        if ($objStartDate == $objEndDate) {
            $dateLabel = $objStartDate->format("d M Y");
        } elseif ($startMonthYear === $endMonthYear) {
            $dateLabel =
                $objStartDate->format("d") .
                " - " .
                $objEndDate->format("d") .
                " " .
                $objEndDate->format("M Y");
        } elseif (
            $startMonthYear !== $endMonthYear &&
            $startYear === $endYear
        ) {
            $dateLabel =
                $objStartDate->format("d M") .
                " - " .
                $objEndDate->format("d M") .
                " " .
                $objEndDate->format("Y");
        } else {
            $dateLabel =
                $objStartDate->format("d M Y") .
                " - " .
                $objEndDate->format("d M Y");
        }

        return $dateLabel;
    }

    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $str
     * @param  string  $separator
     * @param  string  $language
     */
    public static function slug(
        $str,
        $separator = "-",
        $language = "en"
    ): string {
        // Convert all dashes/underscores into separator
        $flip = $separator == "-" ? "_" : "-";
        $str = preg_replace(
            "![" . preg_quote($flip, "!") . "]+!u",
            $separator,
            $str
        );

        // Replace @ with the word 'at'
        $str = str_replace("@", $separator . "at" . $separator, $str);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $str = preg_replace(
            "![^" . preg_quote($separator, "!") . "\pL\pN\s]+!u",
            "",
            mb_strtolower($str)
        );

        // Replace all separator characters and whitespace by a single separator
        $str = preg_replace(
            "![" . preg_quote($separator, "!") . "\s]+!u",
            $separator,
            $str
        );
        return trim($str, $separator);
    }

    /**
     * Generate a clean full URL
     *
     * @param  string  $url
     * @param  string  $separator
     * @param  string  $language
     */
    public static function url($url, $separator = "-", $language = "en"): string
    {
        $delimiter = "/";

        $url = trim($url, $delimiter);

        $segments = explode($delimiter, $url);

        $cleanedSegments = [];

        foreach ($segments as $segment) {
            $segment = self::slug($segment, $separator, $language);

            if (!empty($segment)) {
                $cleanedSegments[] = $segment;
            }
        }

        return implode("/", $cleanedSegments);
    }

    /**
     * Check if file physically exists
     *
     * @param  string  $srcPath
     */
    public static function isFile($srcPath): bool
    {
        $srcPath = BASE_PATH . $srcPath;

        $srcPath = str_replace("/", DS, $srcPath);

        return is_file($srcPath);
    }

    /**
     * Resize an image to give size
     *
     * @param string  $srcPath, Description - base path of image
     * @param integer $width, Description - Width of new thumb
     * @param integer $height, Description - Height of new thumb
     *
     * @return boolean
     */

    public static function resizeImage($srcPath, $width, $height)
    {
        if (empty($srcPath)) {
            return false;
        }

        if (empty($width)) {
            return false;
        }

        if (empty($height)) {
            return false;
        }

        // Validate src dir
        if (!str_contains($srcPath, "/" . LIBRARY_DIR)) {
            $srcPath = "/" . LIBRARY_DIR . $srcPath;
        }

        $srcFullPath = BASE_PATH . str_replace("/", DS, $srcPath);

        if (!is_file($srcFullPath)) {
            return false;
        }

        new ImageResizer();
    }

    /**
     * Create a thumbnail of the given image
     *
     * @param string  $srcPath, Description - base path of image
     * @param integer $width, Description - Width of new thumb
     * @param integer $height, Description - Height of new thumb
     *
     * @return mixed
     */

    public static function createImageThumb(
        $srcPath,
        $width,
        $height,
        $prevPath = null
    ): bool|string {
        try {
            if (empty($srcPath)) {
                return false;
            }

            if (empty($width)) {
                return false;
            }

            if (empty($height)) {
                return false;
            }

            // Validate src dir
            if (!str_contains($srcPath, "/" . LIBRARY_DIR)) {
                $srcPath = "/" . LIBRARY_DIR . $srcPath;
            }

            if (!empty($prevPath)) {
                $prevPath = BASE_PATH . $prevPath;
                $prevPath = str_replace("/", DS, $prevPath);

                if (is_file($prevPath)) {
                    unlink($prevPath);
                }
            }

            $srcFullPath = BASE_PATH . str_replace("/", DS, $srcPath);

            if (!is_file($srcFullPath)) {
                return false;
            }

            $arrPathInfo = pathinfo($srcFullPath);
            $fileName =
                $arrPathInfo["filename"] .
                "-" .
                substr((string) createRandomChars(), 0, 5);
            $fileExt = $arrPathInfo["extension"];
            $thumbExt = "webp";

            $objResizer = new ImageResizer();

            $objResizer->setSaveDirectory(UPLOADS_DIR_PATH);
            $objResizer->setSaveType($thumbExt);
            $objResizer->setMaxWidth($width);
            $objResizer->setMaxHeight($height);
            $objResizer->path = $srcFullPath;
            $objResizer->newImageNewName = $fileName;

            if (in_array($fileExt, ["jpg", "jpeg"])) {
                $objResizer->setQuality(70);
            }

            $objResizer->resizeToFit();

            error_log("Savedirectory: " . $objResizer->savedirectory . ", newImageNewName: " . $objResizer->newImageNewName . PHP_EOL, 3, "error.log");

        } catch (\Exception $e) {
            error_log(date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL, 3, "error.log");

            // Return false or handle the error in another way
            return false;
        }

        $returnPath = "/" . UPLOADS_DIR . "/" . $fileName . "." . $thumbExt;
        error_log("Return path: " . $returnPath . PHP_EOL, 3,"error.log");

        return $returnPath;
    }

    /**
     * Redirect to the given URL with given code (optional)
     *
     * @param string $url, Description - location url
     * @param integer $statusCode, Description - redirect code
     *
     * @return void
     */
    public static function redirect($url, $statusCode = null)
    {
        $url = filter_var($url, FILTER_VALIDATE_URL);

        if (!empty($url)) {
            if (!empty($statusCode)) {
                header("Location: " . $url, true, $statusCode);
            } else {
                header("Location: " . $url, false);
            }

            exit();
        }
    }

    /**
     * Returns the specified text ($needle) wrapped in span
     *
     * @param string $needle, Description - string to wrap
     * @param string $haystack, Description - string to search in
     *
     * @return string
     */
    public static function getHighlightedText($needle, $haystack)
    {
        return str_replace($needle, "<span>" . $needle . "</span>", $haystack);
    }

    /**
     * Returns URL Path
     *
     * @return string
     */
    public static function getUrlPath($url)
    {
        $tempUrl = filter_var($url, FILTER_VALIDATE_URL);

        if (!empty($tempUrl)) {
            $components = parse_url((string) $url);
            $url = $components["path"];
            $url .= empty($components["query"])
                ? ""
                : "?" . $components["query"];
            $url .= empty($components["fragment"])
                ? ""
                : "#" . $components["fragment"];
        } else {
            $url = "/" . ltrim((string) $url, "/");
        }

        return $url;
    }

    /**
     * Returns the full page URL
     */
    public static function getFullUrl(...$segments): string
    {
        $delimiter = "/";

        $strSegments = ltrim(implode($delimiter, $segments), $delimiter);

        return BASE_URL . $delimiter . $strSegments;
    }

    /**
     * Get file path
     *
     * @param  string  $filePath
     * @param  bool    $appendVersion
     * @return string
     */
    public static function getFileFullURL(
        $filePath,
        $appendVersion = true
    ): bool|string {
        if ($filePath === "" || $filePath === "0") {
            return false;
        }

        $filePath = str_replace("/", DS, $filePath);

        $fileFullPath = realpath(ltrim($filePath, "/"));

        if (is_file($fileFullPath)) {
            $filePath = BASE_URL . DS . $filePath;

            $filePath = str_replace(DS, "/", $filePath);

            return $filePath .
                ($appendVersion ? "?v=" . filemtime($fileFullPath) : "");
        }

        return false;
    }

    /**
     * Generates mail to link
     *
     * @param string $email
     * @return string
     */

    public static function mailTo($email): string|bool
    {
        if ($email !== "" && $email !== "0") {
            return '<a href="mailto:' . $email . '">' . $email . "</a>";
        }

        return false;
    }

    /**
     * @param string $name The name of input.
     *
     * @return bool Return if Image Captcha is valid.
     */
    public static function validateImageCaptcha($name = "spam-control")
    {
        $captcha = validateInput($name, FILTER_SANITIZE_ADD_SLASHES);
        $hashedCaptcha = hash("sha512", sha1(md5((string) $captcha)));
        $captchaValue = empty($_SESSION["captcha"]) ? "" : $_SESSION["captcha"];
        return $hashedCaptcha == $captchaValue;
    }

    /**
     * to set message text
     *
     * @param string $msg, Description - message text
     * @param integer $statusCode, Description - redirect code
     *
     * @return void
     */
    public static function setMessageText($msg)
    {
        $_SESSION["flashMsg"] = $msg;
    }

    /**
     * to get message text
     *
     * @param string $msg, Description - message text
     *
     * @return string
     */
    public static function getMessageText()
    {
        $message = empty($_SESSION["flashMsg"]) ? "" : $_SESSION["flashMsg"];

        unset($_SESSION["flashMsg"]);

        return $message;
    }

    /**
     * function to create variables based on array
     *
     * @param string $arrOptions, Description - array of items
     * @param string $prefix, Description - variable prefix
     *
     * @return mixes
     */
    public static function createVariables($arrOptions = [], $prefix = null)
    {
        $optionKey = null;
        if (!empty($arrOptions)) {
            $prefix = empty($prefix) ? "" : ucwords(strtolower($prefix));

            $optionKey = str_replace(
                "_",
                "",
                ucwords((string) $optionKey, "_")
            );

            $arrOutput = [];

            foreach ($arrOptions as $option) {
                $optionKey = $option["opKey"];
                $optionValue = $option["opValue"];

                $optionKey = lcfirst(
                    $prefix .
                        str_replace("_", "", ucwords((string) $optionKey, "_"))
                );

                $arrOutput[$optionKey] = $optionValue;
            }

            return (object) $arrOutput;
        }

        return false;
    }

    /**
     * function to process template
     *
     * @param string $template, Description - html message
     * @param string $tags, Description - items to replace in html message
     *
     * @return string
     */
    public static function processTemplateBody(
        $template,
        $tags = [],
        $startTag = "{",
        $endTag = "}"
    ) {
        if (!empty($template)) {
            /** replace tags with value */
            foreach ($tags as $tag => $value) {
                $value = $value ?: "";
                $template = str_replace(
                    "$startTag{$tag}$endTag",
                    $value,
                    $template
                );
            }

            return $template;
        } else {
            return null;
        }
    }

    /**
     * Process tamplate file to replace tags with value
     *
     * @param string $path, Description - path of file
     * @param string $tags, Description - items to replace in html message
     *
     * @return string
     */
    public static function processTemplate(
        $path,
        $tags = [],
        $startTag = "{",
        $endTag = "}"
    ) {
        if (file_exists($path)) {
            /** read email tempalte file */
            $template = file_get_contents($path);

            /** replace tags with value */
            foreach ($tags as $tag => $value) {
                $value = $value ?: "";
                $template = str_replace(
                    "$startTag{$tag}$endTag",
                    $value,
                    $template
                );
            }

            return $template;
        } else {
            return null;
        }
    }

    /**
     * Checks and Truncates a string to the number of words / characters specified.
     *
     * @param  string  $text
     * @param  integer $length
     * @param  string  $ending
     * @param  bool    $byWords
     * @param  bool    $html
     * @return string
     */
    public static function strTruncate(
        $text,
        $length = 100,
        $ending = "...",
        $byWords = true,
        $html = true
    ) {
        $eTags = "img|br|input|hr|area|base|basefont|col|frame|";
        $eTags .= "isindex|link|meta|param";

        $matchPattern1 = "/^<(\s*.+?\/\s*|\s*({$eTags})(\s.+?)?)>$/is";

        $matchPattern2 = "/&[0-9a-z]{2,8};|&#\\d{1,7};|[0-9a-f]{1,6};/i";

        if ($html) {
			if ($text === null) {
				// Handle the case where $text is null, for example by returning an empty string
				return '';
			}
			
			if (strlen((string) preg_replace("/<.*?>/", "", $text)) <= $length) {
				return $text;
			}
            /** splits all html-tags to scanable lines */
            preg_match_all(
                "/(<.+?>)?([^<>]*)/s",
                $text,
                $lines,
                PREG_SET_ORDER
            );
            $totalLength = strlen($ending);
            $openTags = [];
            $output = "";
            foreach ($lines as $line) {
                if (!empty($line[1])) {
                    if (preg_match($matchPattern1, (string) $line[1])) {
                        /** do nothing */
                    } elseif (
                        preg_match('/^<\s*\/([^\s]+?)\s*>$/s', (string) $line[1], $tag)
                    ) {
                        /** delete tag from $openTags list */
                        $pos = array_search($tag[1], $openTags);

                        if ($pos !== false) {
                            unset($openTags[$pos]);
                        }
                    } elseif (
                        preg_match('/^<\s*([^\s>!]+).*?>$/s', (string) $line[1], $tag)
                    ) {
                        /** Add tag to the beginning of $openTags list */
                        array_unshift($openTags, strtolower($tag[1]));
                    }

                    /** Add html-tag to $output'd text */
                    $output .= $line[1];
                }

                /**
                 *  Calculate the length of the plain text part of the line;
                 *  Handle entities as one character
                 */

                $contentLength = strlen(
                    (string) preg_replace($matchPattern2, " ", $line[2])
                );

                if ($totalLength + $contentLength > $length) {
                    /** the number of characters which are left */
                    $left = $length - $totalLength;
                    $entityLength = 0;

                    /** search for html entities */
                    if (
                        preg_match_all(
                            $matchPattern2,
                            (string) $line[2],
                            $entities,
                            PREG_OFFSET_CAPTURE
                        )
                    ) {
                        /** calculate the real length of all entities in the legal range */
                        foreach ($entities[0] as $entity) {
                            if ($entity[1] + 1 - $entityLength <= $left) {
                                $left--;
                                $entityLength += strlen((string) $entity[0]);
                            } else {
                                /** no more characters left */
                                break;
                            }
                        }
                    }

                    $output .= substr($line[2], 0, $left + $entityLength);
                    /** maximum lenght is reached, so get off the loop */
                    break;
                } else {
                    $output .= $line[2];
                    $totalLength += $contentLength;
                }

                /** if the maximum length is reached, get off the loop */
                if ($totalLength >= $length) {
                    break;
                }
            }
        } elseif (strlen($text) <= $length) {
            return $text;
        } else {
            $output = substr($text, 0, $length - strlen($ending));
        }

        /** if the words shouldn't be cut in the middle */
        if ($byWords) {
            /** search the last occurance of a space */
            $spacepos = strrpos($output, " ");

            $output = substr($output, 0, $spacepos);
        }

        /** add the defined ending to the text */
        $output .= $ending;

        if ($html) {
            /** close all unclosed html-tags */
            foreach ($openTags as $tag) {
                $output .= "</" . $tag . ">";
            }
        }
        return $output;
    }
}
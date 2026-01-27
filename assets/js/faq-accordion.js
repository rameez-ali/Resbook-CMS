document.addEventListener('DOMContentLoaded', function () {
    const faqHeaders = document.querySelectorAll('.faq-accordion-header');

    faqHeaders.forEach(header => {
        header.addEventListener('click', function () {
            const item = this.parentElement;
            const isActive = item.classList.contains('active');

            // Close all other items
            document.querySelectorAll('.faq-accordion-item').forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                    const otherIcon = otherItem.querySelector('.faq-accordion-icon i');
                    if (otherIcon) {
                        otherIcon.classList.remove('fa-minus');
                        otherIcon.classList.add('fa-plus');
                    }
                }
            });

            // Toggle current item
            if (isActive) {
                item.classList.remove('active');
                const icon = this.querySelector('.faq-accordion-icon i');
                if (icon) {
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                }
            } else {
                item.classList.add('active');
                const icon = this.querySelector('.faq-accordion-icon i');
                if (icon) {
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                }
            }
        });
    });
});

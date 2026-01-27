<?php

/**
 * Helper for managing FAQs on pages.
 */
class PageFaqHelper
{
    /**
     * Get the FAQ tab content for the CMS.
     */
    public static function getFaqData($faqs_content, $faqs_heading, $faqs_rank)
    {
        $faqs = json_decode($faqs_content, true);
        if (!is_array($faqs)) {
            $faqs = [];
        }

        $faqRows = '';
        foreach ($faqs as $index => $faq) {
            $faqRows .= self::generateFaqRow($index, $faq['question'], $faq['answer']);
        }

        $output = '
        <h2 class="form-section-heading">FAQ Section</h2>
        <table width="100%" border="0" cellspacing="0" cellpadding="6">
            <tr>
                <td width="160"><label for="faqs_heading">FAQ Heading:</label></td>
                <td><input type="text" name="faqs_heading" id="faqs_heading" value="' . htmlspecialchars($faqs_heading, ENT_QUOTES) . '" style="width:550px;" /></td>
            </tr>
            <tr>
                <td colspan="2"><small><em>Set the FAQ rank in the <strong>Modules</strong> tab to control display order</em></small></td>
            </tr>
        </table>
        <hr class="content-hr">
        <div id="faq-container">
            ' . $faqRows . '
        </div>
        <button type="button" class="btn btn-primary" onclick="addFaqRow()">Add FAQ</button>

        <script>
            function addFaqRow() {
                var index = $("#faq-container .faq-row").length;
                var html = `
                    <div class="faq-row" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; position: relative;">
                        <button type="button" class="btn btn-danger btn-xs" style="position: absolute; right: 10px; top: 10px;" onclick="$(this).parent().remove()">Remove</button>
                        <div style="margin-bottom: 5px;">
                            <label>Question:</label><br>
                            <input type="text" name="faqs[${index}][question]" style="width: 90%;">
                        </div>
                        <div>
                            <label>Answer:</label><br>
                            <textarea name="faqs[${index}][answer]" style="width: 90%; height: 60px;"></textarea>
                        </div>
                    </div>
                `;
                $("#faq-container").append(html);
            }
        </script>
        ';

        return $output;
    }

    private static function generateFaqRow($index, $question, $answer)
    {
        return '
            <div class="faq-row" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; position: relative;">
                <button type="button" class="btn btn-danger btn-xs" style="position: absolute; right: 10px; top: 10px;" onclick="$(this).parent().remove()">Remove</button>
                <div style="margin-bottom: 5px;">
                    <label>Question:</label><br>
                    <input type="text" name="faqs[' . $index . '][question]" value="' . htmlspecialchars($question, ENT_QUOTES) . '" style="width: 90%;">
                </div>
                <div>
                    <label>Answer:</label><br>
                    <textarea name="faqs[' . $index . '][answer]" style="width: 90%; height: 60px;">' . htmlspecialchars($answer, ENT_QUOTES) . '</textarea>
                </div>
            </div>
        ';
    }
}

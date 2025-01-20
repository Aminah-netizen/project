<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

/**
 * CustomHtml helper
 */
class CustomHtmlHelper extends Helper
{
    /**
     * Convert HTML content to plain text.
     *
     * @param string $html HTML content.
     * @return string Plain text version of the HTML.
     */
    public function convertHtmlToPlainText($html)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($html, LIBXML_NOERROR | LIBXML_NOWARNING);

        $plainText = '';

        foreach ($dom->getElementsByTagName('body')->item(0)->childNodes as $node) {
            $plainText .= $this->convertNodeToText($node) . "\n"; // Add a newline after each top-level node
        }

        return trim($plainText); // Trim any extra newlines at the end
    }

    /**
     * Convert individual HTML nodes to text.
     *
     * @param \DOMNode $node A DOM node.
     * @return string Plain text representation of the node.
     */
    private function convertNodeToText($node)
    {
        if ($node->nodeName === 'ol') {
            $text = "\n"; // Start with a newline for ordered lists
            $index = 1;
            foreach ($node->childNodes as $child) {
                if ($child->nodeName === 'li') {
                    $text .= $index++ . '. ' . $this->convertNodeToText($child) . "\n"; // Add newline after each <li>
                }
            }
            return $text;
        } elseif ($node->nodeName === 'ul') {
            $text = "\n"; // Start with a newline for unordered lists
            foreach ($node->childNodes as $child) {
                if ($child->nodeName === 'li') {
                    $text .= '- ' . $this->convertNodeToText($child) . "\n"; // Add newline after each <li>
                }
            }
            return $text;
        } elseif ($node->nodeName === '#text') {
            return trim($node->nodeValue); // Return text content of the node
        } else {
            $text = '';
            foreach ($node->childNodes as $child) {
                $text .= $this->convertNodeToText($child);
            }
            return $text;
        }
    } 
}

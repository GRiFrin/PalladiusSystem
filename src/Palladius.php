<?php
/**
 * Transcribing Chinese characters (pinyin) into the Cyrillic alphabet.
 *
 * @author    Rinat Gazizov <info@grifsoftware.net>
 * @copyright 2016 Rinat Gazizov <info@grifsoftware.net>
 *
 * @link      https://github.com/GRiFrin/Palladius
 */

namespace GRiFrin\Palladius;


class Palladius
{
    /**
     * Pinyin/Cyrillic dictionary.
     *
     * @var array
     */
    protected $dictionary = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->dictionary = include __DIR__.'/dictionary.php';
        if (empty($this->dictionary) || !is_array($this->dictionary)) {
            throw new \Exception('Dictionary is not loaded');
        }
    }

    /**
     * Convert pinyin to cyrillic.
     *
     * @param array $pinyin
     * @param boolean $preserveSource
     *
     * @return array
     */
    public function convert($pinyin, $preserveSource = false)
    {
        $result = array();

        if (is_array($pinyin)) {
            foreach ($pinyin as $key => $item) {
                $wordKey = trim(mb_strtolower($item));
                $cyrillicWord = isset($this->dictionary[$wordKey]) ? $this->dictionary[$wordKey] : null;
                $result[$key] = $preserveSource ? array('pinyin' => $item, 'cyrillic' => $cyrillicWord) : $cyrillicWord;
            }
        }

        return $result;
    }
}
<?php

class VowelRemoval
{
    private $vowels = ['a', 'e', 'i', 'o', 'u'];

    /**
     * Executes the strippin'
     *
     * @param  string|array $arg The input can be either a string or an array
     * @return string|array
     */
    public function execute($arg)
    {
        if (is_array($arg)) {
            return $this->stripFromArrays($arg);
        }

        return $this->strip($arg);
    }

    /**
     * Strip vowels from an array
     *
     * @param array
     * @return array
     */
    private function stripFromArrays($arg)
    {
        $output = [];

        foreach ($arg as $string) {
            $output[] = $this->strip($string);
        }

        return $output;
    }

    /**
     * Remove the vowels from a string
     *
     * @param  string $string
     * @return string
     */
    private function strip($string)
    {
        if (empty($string)) {
            throw new InvalidArgumentException("String cannot be empty");
        }

        $consonants = '';
        $string = (string) $string;
        $stringLength = strlen($string);

        for ($i = 0; $i < $stringLength; $i++) {
            if (!in_array(strtolower($string[$i]), $this->vowels)) {
                $consonants .= $string[$i];
            }
        }

        return $consonants;
    }
}

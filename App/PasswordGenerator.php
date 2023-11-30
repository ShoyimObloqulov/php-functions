<?php
set_time_limit(120);
class PasswordGenerator {
    private $length;
    private $includeNumbers;
    private $includeLowercase;
    private $includeUppercase;
    private $beginWithLetter;
    private $includeSymbols;
    private $noSimilarCharacters;
    private $noDuplicateCharacters;
    private $noSequentialCharacters;

    private string $symbols = '!";#$%&\'()*+,-./:;<=>?@[]^_`{|}~';

    public function __construct($length, $includeNumbers, $includeLowercase, $includeUppercase, $beginWithLetter, $includeSymbols, $noSimilarCharacters, $noDuplicateCharacters, $noSequentialCharacters) {
        $this->length = $length;
        $this->includeNumbers = $includeNumbers;
        $this->includeLowercase = $includeLowercase;
        $this->includeUppercase = $includeUppercase;
        $this->beginWithLetter = $beginWithLetter;
        $this->includeSymbols = $includeSymbols;
        $this->noSimilarCharacters = $noSimilarCharacters;
        $this->noDuplicateCharacters = $noDuplicateCharacters;
        $this->noSequentialCharacters = $noSequentialCharacters;
    }

    public function generatePassword(): string
    {
        $password = '';

        $characters = '';
        if ($this->includeNumbers) $characters .= '0123456789';
        if ($this->includeLowercase) $characters .= 'abcdefghijklmnopqrstuvwxyz';
        if ($this->includeUppercase) $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($this->includeSymbols) $characters .= $this->symbols;

        if ($this->noSimilarCharacters) {
            $characters = str_replace(['i', 'l', '1', 'L', 'o', '0', 'O'], '', $characters);
        }

        // Generate password
        while (strlen($password) < $this->length) {
            $char = $characters[random_int(0, strlen($characters) - 1)];

            if ($this->noDuplicateCharacters && strpos($password, $char) !== false) {
                continue;
            }

            if ($this->noSequentialCharacters && strlen($password) >= 2) {
                $lastChar = $password[strlen($password) - 1];
                $secondLastChar = $password[strlen($password) - 2];

                if (strpos($characters, $lastChar) !== false && strpos($characters, $secondLastChar) !== false) {
                    $lastCharIndex = strpos($characters, $lastChar);
                    $secondLastCharIndex = strpos($characters, $secondLastChar);

                    if (abs($lastCharIndex - $secondLastCharIndex) == 1) {
                        continue;
                    }
                }
            }
            $password .= $char;
        }

        if ($this->beginWithLetter && !ctype_alpha($password[0])) {
            $firstLetter = $characters[random_int(10, 35)];
            $password[0] = $firstLetter;
        }

        return $password;
    }
}


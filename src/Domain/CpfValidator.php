<?php

namespace Src\Domain;

final class CpfValidator
{
    public static function validate(mixed $cpf): bool
    {
        if (! is_string($cpf)) {
            return false;
        }

        $cpf = str_replace(['.', '-', ' '], '', $cpf);

        if (! preg_match('/^\d{11}$/', $cpf)) {
            return false;
        }

        // todos os dígitos iguais (ex.: 11111111111)
        if (count(array_unique(str_split($cpf))) === 1) {
            return false;
        }

        $digits = array_map('intval', str_split($cpf));

        $firstCheckDigit = self::calculateCheckDigit(array_slice($digits, 0, 9), 10);
        $secondCheckDigit = self::calculateCheckDigit(array_slice($digits, 0, 10), 11);

        return $digits[9] === $firstCheckDigit
            && $digits[10] === $secondCheckDigit;
    }

    /**
     * @param  int[]  $digits
     */
    private static function calculateCheckDigit(array $digits, int $factor): int
    {
        $sum = 0;

        foreach ($digits as $digit) {
            $sum += $digit * $factor--;
        }

        $rest = $sum % 11;

        return $rest < 2 ? 0 : 11 - $rest;
    }
}

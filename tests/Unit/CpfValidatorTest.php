<?php

namespace Tests\Feature;

use Src\Domain\CpfValidator;
use Tests\TestCase;

class CpfValidatorTest extends TestCase
{
    public function test_deve_validar_um_cpf_com_dois_digitos_diferentes_de_zero()
    {
        $cpf = '97456321558';
        $this->assertTrue(CpfValidator::validate($cpf));
    }

    public function test_deve_validar_um_cpf_com_o_segundo_digito_diferente_de_zero()
    {
        $cpf = '71428793860';
        $this->assertTrue(CpfValidator::validate($cpf));
    }

    public function test_deve_validar_um_cpf_com_o_primeiro_digito_diferente_de_zero()
    {
        $cpf = '87748248800';
        $this->assertTrue(CpfValidator::validate($cpf));
    }

    public function test_deve_verificar_um_cpf_valido_com_formatacao(): void
    {
        $this->assertTrue(CpfValidator::validate('974.563.215-58'));
    }

    public function test_deve_verificar_um_cpf_com_o_digito_invalido()
    {
        $this->assertFalse(CpfValidator::validate('97456321550'));
    }

    public function test_deve_verificar_um_cpf_invalido_com_todos_os_digitos_iguais()
    {
        $this->assertFalse(CpfValidator::validate('11111111111'));
    }

    public function test_deve_verificar_um_cpf_invalido_null()
    {
        $this->assertFalse(CpfValidator::validate(null));
    }
}

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.primeiracalculadora1;

/**
 *
 * @author FATEC ZONA LESTE
 */
public class PrimeiraCalculadora1 { //Meu nome é giulio e essa é minha primeira calculadora

    public static void main(String[] args) {
     //definção de dois numeros
     double num1 = 10.3;
     double num2 = 5.1;
             //realizando operações matematicas
             double soma = num1 + num2;
             double subtracao = num1 - num2;
             double multiplicacao = num1 * num2;
             double divisao = num2 != 0 ? num1 / num2 : Double.NaN;//evite divisão quebrada
             double resto = num1 % num2;
             
             //exibindo os resultados
             System.out.println ("resultado das operações");
             System.out.println ("soma: " + soma);
             System.out.println ("Subtração: " + subtracao);
             System.out.println ("Multiplicação: " + multiplicacao);
             System.out.println ("divisão: " + (num2 != 0 ? divisao :
             "Indefinido (divisão por zero)"));
             System.out.println ("resto da divisão: " + resto);
    }
}

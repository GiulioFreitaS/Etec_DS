/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.cadastro_de_dados;

import java.util.Scanner;
public class Cadastro_de_Dados {
 public static void main(String[] args) {
 Scanner sc = new Scanner(System.in);
 System.out.print("Digite seu nome: ");
 String nome = sc.nextLine();
 System.out.print("Digite sua data de nascimento: ");
 String nascimento = sc.nextLine();
 System.out.print("Digite seu curso: ");
 String curso = sc.nextLine();
 System.out.print("Digite sua série: ");
 String serie = sc.nextLine();
 System.out.print("Digite sua altura: ");
 double altura = sc.nextDouble();
 System.out.print("Digite seu peso: ");
 double peso = sc.nextDouble();
 System.out.println("\n--- Dados Cadastrados ---");
 System.out.println("Nome: " + nome);
 System.out.println("Data de Nascimento: " + nascimento);
 System.out.println("Curso: " + curso);
 System.out.println("Série: " + serie);
 System.out.println("Altura: " + altura);
 System.out.println("Peso: " + peso);
 }
}
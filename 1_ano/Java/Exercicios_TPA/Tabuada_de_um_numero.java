/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.tabuada_de_um_numero;

import java.util.Scanner;
public class Tabuada_de_um_numero {
 public static void main(String[] args) {
 Scanner sc = new Scanner(System.in);
 int numero;
 System.out.print("Digite um número para ver a tabuada: ");
 numero = sc.nextInt();
 for (int i = 1; i <= 10; i++) {
 System.out.println(numero + " x " + i + " = " + (numero * i));
 }
 }
}
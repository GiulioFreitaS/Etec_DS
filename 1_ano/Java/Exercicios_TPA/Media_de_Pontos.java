/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.media_de_pontos;

import java.util.Scanner;
public class Media_de_Pontos {
 public static void main(String[] args) {
 Scanner sc = new Scanner(System.in);
 double nota1, nota2, nota3, nota4, media;
 System.out.print("Digite a primeira nota: ");
 nota1 = sc.nextDouble();
 System.out.print("Digite a segunda nota: ");
 nota2 = sc.nextDouble();
 System.out.print("Digite a terceira nota: ");
 nota3 = sc.nextDouble();
 System.out.print("Digite a quarta nota: ");
 nota4 = sc.nextDouble();
 media = (nota1 + nota2 + nota3 + nota4) / 4;
 System.out.println("A média das notas é: " + media);
 }
}

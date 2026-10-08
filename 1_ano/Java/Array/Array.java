/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.array;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

public class Array {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        executarNumeros(sc);
        executarNomes(sc);

        sc.close();
    }

    // ========================== EXERCÍCIO 1 ==========================
    public static void executarNumeros(Scanner sc) {

        ArrayList<Integer> numeros = new ArrayList<>();
        int num;

        System.out.println("\nDigite vários números (digite 0 para parar):");

        do {
            num = sc.nextInt();
            if (num != 0) {
                numeros.add(num);
            }
        } while (num != 0);

        System.out.println("\nNúmeros pares:");
        for (int n : numeros) {
            if (n % 2 == 0) {
                System.out.println(n);
            }
        }

        System.out.println("\nNúmeros ímpares:");
        for (int n : numeros) {
            if (n % 2 != 0) {
                System.out.println(n);
            }
        }

        sc.nextLine(); // limpa buffer antes de ler nomes
    }

    // ========================== EXERCÍCIO 2 ==========================
    public static void executarNomes(Scanner sc) {

        ArrayList<String> nomes = new ArrayList<>();
        String nome;

        System.out.println("\nDigite vários nomes (digite FIM para parar):");

        do {
            nome = sc.nextLine();
            if (!nome.equalsIgnoreCase("FIM")) {
                nomes.add(nome);
            }
        } while (!nome.equalsIgnoreCase("FIM"));

        Collections.sort(nomes);
        System.out.println("\nOrdem Crescente (A → Z):");
        for (String n : nomes) {
            System.out.println(n);
        }

        Collections.sort(nomes, Collections.reverseOrder());
        System.out.println("\nOrdem Decrescente (Z → A):");
        for (String n : nomes) {
            System.out.println(n);
        }
    }
}

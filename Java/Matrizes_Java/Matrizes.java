/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.matrizes;
import java.util.HashSet;
import java.util.Scanner;

public class Matrizes {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);

        // ============================================================
        // ===================== ATIVIDADE 1 ===========================
        // ============================================================
        System.out.println("ATIVIDADE 1 - Matriz 4x4 Soma e Média dos Pares");
        int[][] mat1 = new int[4][4];
        int somaPares = 0, qtdPares = 0;

        for (int i = 0; i < 4; i++) {
            for (int j = 0; j < 4; j++) {
                System.out.print("Digite mat[" + i + "][" + j + "]: ");
                mat1[i][j] = sc.nextInt();
                if (mat1[i][j] % 2 == 0) {
                    somaPares += mat1[i][j];
                    qtdPares++;
                }
            }
        }

        double mediaPares = qtdPares > 0 ? (double) somaPares / qtdPares : 0;

        System.out.println("Soma dos pares: " + somaPares);
        System.out.println("Média dos pares: " + mediaPares);
        System.out.println("--------------------------------------------------\n");



        // ============================================================
        // ===================== ATIVIDADE 2 ===========================
        // ============================================================
        System.out.println("ATIVIDADE 2 — Matrizes exibidas");

        // a) Matriz 4x5 de caracteres
        char[][] matrizA2 = {
            {'a','b','c','d','e'},
            {'f','g','h','i','j'},
            {'l','m','n','o','p'},
            {'q','r','s','t','u'}
        };

        System.out.println("Matriz A2:");
        exibirMatrizChar(matrizA2);

        // b) Matriz 3x4 de inteiros
        int[][] matrizB2 = {
            {19, 25, 100, 99},
            {10, 7, 25, 14},
            {35, 2, 47, 74}
        };

        System.out.println("\nMatriz B2:");
        exibirMatriz(matrizB2);

        // c) Matriz 3x3 de decimais
        double[][] matrizC2 = {
            {1.9, 2.5, 10.0},
            {1.0, 7.8, 2.5},
            {3.5, 2.2, 4.7}
        };

        System.out.println("\nMatriz C2:");
        exibirMatrizDouble(matrizC2);
        System.out.println("--------------------------------------------------\n");



        // ============================================================
        // ===================== ATIVIDADE 3 ===========================
        // ============================================================
        System.out.println("ATIVIDADE 3 - Matriz 5x5 Somatórios");

        int[][] mat3 = new int[5][5];
        int somaImpares = 0;
        int[] somaColunas = new int[5];
        int[] somaLinhas = new int[5];

        for (int i = 0; i < 5; i++) {
            for (int j = 0; j < 5; j++) {
                System.out.print("Digite mat[" + i + "][" + j + "]: ");
                mat3[i][j] = sc.nextInt();

                if (mat3[i][j] % 2 != 0) somaImpares += mat3[i][j];
                somaColunas[j] += mat3[i][j];
                somaLinhas[i] += mat3[i][j];
            }
        }

        System.out.println("\nSoma dos ímpares: " + somaImpares);

        for (int j = 0; j < 5; j++) {
            System.out.println("Soma da coluna " + j + ": " + somaColunas[j]);
        }
        for (int i = 0; i < 5; i++) {
            System.out.println("Soma da linha " + i + ": " + somaLinhas[i]);
        }
        System.out.println("--------------------------------------------------\n");



        // ============================================================
        // ===================== ATIVIDADE 4 ===========================
        // ============================================================
        System.out.println("ATIVIDADE 4 - Matriz 3x5: repetidos, pares e ímpares");

        int[][] mat4 = new int[3][5];
        HashSet<Integer> set = new HashSet<>();
        HashSet<Integer> repetidos = new HashSet<>();
        int pares4 = 0, impares4 = 0;

        for (int i = 0; i < 3; i++) {
            for (int j = 0; j < 5; j++) {
                System.out.print("Digite mat[" + i + "][" + j + "]: ");
                int val = sc.nextInt();
                mat4[i][j] = val;

                if (!set.add(val)) repetidos.add(val);

                if (val % 2 == 0) pares4++;
                else impares4++;
            }
        }

        System.out.println("\nPossui elementos repetidos? " + (!repetidos.isEmpty()));
        if (!repetidos.isEmpty()) System.out.println("Valores repetidos: " + repetidos);

        System.out.println("Quantidade de pares: " + pares4);
        System.out.println("Quantidade de ímpares: " + impares4);
        System.out.println("--------------------------------------------------\n");



        // ============================================================
        // ===================== ATIVIDADE 5 ===========================
        // ============================================================
        System.out.println("ATIVIDADE 5 - Matriz 4x4 decimais");

        double[][] mat5 = new double[4][4];

        for (int i = 0; i < 4; i++) {
            for (int j = 0; j < 4; j++) {
                System.out.print("Digite mat[" + i + "][" + j + "]: ");
                mat5[i][j] = sc.nextDouble();
            }
        }

        System.out.println("\nDiagonal principal:");
        for (int i = 0; i < 4; i++) System.out.print(mat5[i][i] + " ");

        System.out.println("\nDiagonal secundária:");
        for (int i = 0; i < 4; i++) System.out.print(mat5[i][3 - i] + " ");
        System.out.println("\n--------------------------------------------------\n");



        // ============================================================
        // ===================== ATIVIDADE 6 ===========================
        // ============================================================
        System.out.println("ATIVIDADE 6 — Figuras de Matrizes\n");

        // FIGURA A — matriz 5×5 cheia
        char[][] fig6a = new char[5][5];
        for (int i = 0; i < 5; i++)
            for (int j = 0; j < 5; j++)
                fig6a[i][j] = '*';

        System.out.println("Figura 6A:");
        exibirMatrizChar(fig6a);


        // FIGURA B — moldura
        char[][] fig6b = new char[4][5];
        for (int i = 0; i < 4; i++) {
            for (int j = 0; j < 5; j++) {
                if (i == 0 || i == 3 || j == 0 || j == 4)
                    fig6b[i][j] = '*';
                else
                    fig6b[i][j] = ' ';
            }
        }

        System.out.println("\nFigura 6B:");
        exibirMatrizChar(fig6b);


        // FIGURA C — L crescente (corrigido)
        // Agora a linha i terá (i+1) estrelas: 1, 2, 3, 4
        char[][] fig6c = new char[4][4];
        for (int i = 0; i < 4; i++) {
            for (int j = 0; j < 4; j++) {
                if (j <= i) {
                    fig6c[i][j] = '*';
                } else {
                    fig6c[i][j] = ' ';
                }
            }
        }

        System.out.println("\nFigura 6C (L crescente):");
        exibirMatrizChar(fig6c);

        sc.close();
    }

    // ============================================================
    // ================== FUNÇÕES DE EXIBIÇÃO ======================
    // ============================================================

    public static void exibirMatriz(int[][] m) {
        for (int[] linha : m) {
            for (int v : linha) System.out.print(v + " ");
            System.out.println();
        }
    }

    public static void exibirMatrizChar(char[][] m) {
        for (char[] linha : m) {
            for (char v : linha) System.out.print(v + " ");
            System.out.println();
        }
    }

    public static void exibirMatrizDouble(double[][] m) {
        for (double[] linha : m) {
            for (double v : linha) System.out.print(v + " ");
            System.out.println();
        }
    }
}

package com.mycompany.exerc_do_while;

import java.util.Scanner;

public class EXERC_DO_WHILE {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        int opcao;

        do {
            // Menu de opções
            System.out.println("\n===== MENU =====");
            System.out.println("1 - Exibir números pares de 1 a 20");
            System.out.println("2 - Tabuada de um número");
            System.out.println("3 - Exibir quantidade de números entre 100 e 125");
            System.out.println("4 - Somar números ímpares entre valores informados");
            System.out.println("0 - Sair");
            System.out.print("Escolha uma opção: ");
            opcao = sc.nextInt();

            switch (opcao) {
                case 1:
                    numerosPares();
                    break;
                case 2:
                    tabuada(sc);
                    break;
                case 3:
                    quantidade();
                    break;
                case 4:
                    somaImpares(sc);
                    break;
                case 0:
                    System.out.println("Encerrando...");
                    break;
                default:
                    System.out.println("Opção inválida!");
            }
        } while (opcao != 0);

        sc.close();
    }

    // 1 - Exibir todos os números pares entre 1 e 20
    public static void numerosPares() {
        int i = 1;
        System.out.println("Números pares entre 1 e 20:");
        do {
            if (i % 2 == 0) { // verifica se é par
                System.out.println(i);
            }
            i++;
        } while (i <= 20);
    }

    // 2 - Exibir a tabuada do número informado
    public static void tabuada(Scanner sc) {
        System.out.print("Digite um número para ver a tabuada: ");
        int num = sc.nextInt();
        int i = 1;
        do {
            System.out.println(num + " x " + i + " = " + (num * i));
            i++;
        } while (i <= 10);
    }

    // 3 - Exibir a quantidade de números entre 100 e 125
    public static void quantidade() {
        int inicio = 100;
        int fim = 125;
        int cont = 0;
        int i = inicio;
        do {
            cont++;
            i++;
        } while (i <= fim);
        System.out.println("Quantidade de números entre 100 e 125 = " + cont);
    }

    // 4 - Somar os números ímpares entre valores informados
    public static void somaImpares(Scanner sc) {
        System.out.print("Digite o valor inicial: ");
        int inicio = sc.nextInt();
        System.out.print("Digite o valor final: ");
        int fim = sc.nextInt();

        // Garantir que inicio <= fim
        if (inicio > fim) {
            int tmp = inicio;
            inicio = fim;
            fim = tmp;
        }

        int soma = 0;
        int i = inicio;
        do {
            if (i % 2 != 0) { // verifica se é ímpar
                soma += i;
            }
            i++;
        } while (i <= fim);

        System.out.println("Soma dos ímpares entre " + inicio + " e " + fim + " = " + soma);
    }
}

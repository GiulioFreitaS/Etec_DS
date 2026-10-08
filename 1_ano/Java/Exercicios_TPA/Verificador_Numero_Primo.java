/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.verificador_numero_primo;

import java.util.Scanner;

public class Verificador_Numero_Primo {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        char continuar;

        do {
            System.out.print("Digite um número inteiro: ");
            int numero = scanner.nextInt();

            boolean primo = true;

            if (numero <= 1) {
                primo = false;
            } else {
                for (int i = 2; i <= Math.sqrt(numero); i++) {
                    if (numero % i == 0) {
                        primo = false;
                        break;
                    }
                }
            }

            if (primo) {
                System.out.println(numero + " é primo.");
            } else {
                System.out.println(numero + " não é primo.");
            }

            System.out.print("Deseja verificar outro número? (s/n): ");
            continuar = scanner.next().charAt(0);

        } while (continuar == 's' || continuar == 'S');

        scanner.close();
    }
}

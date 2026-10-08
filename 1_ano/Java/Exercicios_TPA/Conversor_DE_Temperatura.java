/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.conversor_de_temperatura;

import java.util.Scanner;

public class Conversor_DE_Temperatura {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.print("Digite a temperatura em graus Celsius: ");
        double celsius = scanner.nextDouble();

        // Fórmula para Fahrenheit: F = (C × 9/5) + 32
        double fahrenheit = (celsius * 9/5) + 32;

        // Fórmula para Kelvin: K = C + 273.15
        double kelvin = celsius + 273.15;

        System.out.println("Temperatura em Fahrenheit: " + fahrenheit);
        System.out.println("Temperatura em Kelvin: " + kelvin);

        scanner.close();
    }
}


    /*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.pitagoras;

import java.util.Scanner;

public class Pitagoras {

    public static void main(String[] args) {

        Scanner sc = new Scanner(System.in);

        System.out.println("Digite o valor do lado A:");
        double a = sc.nextDouble();

        System.out.println("Digite o valor do lado B:");
        double b = sc.nextDouble();

        double c = Math.sqrt((a * a) + (b * b));

        System.out.println("A hipotenusa é: " + c);

    }

}

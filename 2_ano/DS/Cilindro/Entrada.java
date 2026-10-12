/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.cilindro;

import java.util.Scanner;

public class Entrada {

    Scanner sc = new Scanner(System.in);

    public double pedirRaio(){
        System.out.println("Digite o raio:");
        return sc.nextDouble();
    }

    public double pedirAltura(){
        System.out.println("Digite a altura:");
        return sc.nextDouble();
    }

}
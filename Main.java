/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.cilindro;


public class Main {

    public static void main(String[] args) {

        Entrada entrada = new Entrada();
        Cilindro calc = new Cilindro();
        Saida saida = new Saida();

        double r = entrada.pedirRaio();
        double h = entrada.pedirAltura();

        double area = calc.calcularAreaLateral(r, h);
        double volume = calc.calcularVolume(r, h);

        saida.mostrarResultado(area, volume);

    }

}

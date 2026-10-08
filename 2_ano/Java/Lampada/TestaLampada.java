/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.lampada;

/**
 *
 * @author Pichau
 */

    public class TestaLampada {

    public static void main(String[] args) {

        Lampada lamp = new Lampada();

        lamp.mostrarEstado();
        lamp.acender();
        lamp.mostrarEstado();
        lamp.apagar();
        lamp.mostrarEstado();

    }

}


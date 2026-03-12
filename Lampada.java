/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.lampada;

/**
 *
 * @author Pichau
 */


public class Lampada {

    boolean estadoDaLampada;

    public void acender() {
        estadoDaLampada = true;
    }

    public void apagar() {
        estadoDaLampada = false;
    }

    public void mostrarEstado() {
        if (estadoDaLampada) {
            System.out.println("A lâmpada está acesa.");
        } else {
            System.out.println("A lâmpada está apagada.");
        }
    }

}


/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.carro;



 public class ExemploCarro {

    public static void main(String[] args) {
        Carro umCarro = new Carro();
        
        
       umCarro.modelo();
       umCarro.cor();
       umCarro.motor();
       
       umCarro.acelerar();
       umCarro.mudarMarcha();
       umCarro.acelerar();
       umCarro.brecar();
       umCarro.desligar();
       
       umCarro = null;
    }

}

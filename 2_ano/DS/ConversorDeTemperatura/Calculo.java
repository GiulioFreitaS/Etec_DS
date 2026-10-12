/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.conversordetemperatura;

/**
 *
 * @author Admin
 */
public class Calculo {
  public double Kelvin_p_Celcius(double K){
        return K - 273.15;
    }

    public double Fahrenheit_p_Celcius(double Fahrenheit){
        return (Fahrenheit - 32) * 5/9; 
    }

}

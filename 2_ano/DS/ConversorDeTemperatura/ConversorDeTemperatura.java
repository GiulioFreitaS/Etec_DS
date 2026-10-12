/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.conversordetemperatura;
import java.util.Scanner;
/**
 *
 * @author Admin
 */
public class ConversorDeTemperatura {

    public static void main(String[] args) {
        
        
        Scanner sc = new Scanner(System.in);
        Calculo calc = new Calculo();
        Saida saida = new Saida();
        
        System.out.println("Voce quer converter Celcius para?");
        System.out.println("1 - Fahrenheit");
        System.out.println("2 - Kelvin");
     
        int op = sc.nextInt();
        
        if (op == 1){
        System.out.println("Digite os Celcius");
        double Celcius = sc.nextDouble();
        double Resultado = calc.Fahrenheit_p_Celcius(Celcius);
        saida.mostrarResultado(Resultado);
        }
        
           if (op == 2){
        System.out.println("Digite os Celcius");
        double Celcius = sc.nextDouble();
        double Resultado = calc.Kelvin_p_Celcius(Celcius);
        saida.mostrarResultado(Resultado);
        }
         
        
        
        
        
        
        
    }
}

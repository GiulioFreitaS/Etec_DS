/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.hipotenusa;
import java.util.Scanner;
/**
 *
 * @author Admin
 */
public class Hipotenusa {
       Scanner sc = new Scanner(System.in);
    
       
       double Base , Altura;
       double Hipotenusa;
    
    void BemVindo(){
    System.out.println("Bem vindo a Calculadora de hipotenusa.");
    }
    
    
    void  introA (){
        System.out.println("Insira o valor da Base: ");
       Base = sc.nextDouble();
    }
    
    void introB (){
    
    System.out.println("Insira o valor da Altura: ");
            Altura = sc.nextDouble();
    }
    
    void Calculo(){
     Hipotenusa = Base*Base + Altura+Altura;
    System.out.println("O resultado da hipotenusa é :" + Hipotenusa );
    }
    
    
    
}

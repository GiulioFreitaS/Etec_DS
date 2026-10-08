/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.bhaskara;
import java.util.Scanner;
/**
 *
 * @author Admin
 */
public class Bhaskara {

    public static void main(String[] args) {
         Scanner sc = new Scanner(System.in);
         
         System.out.print("Formula de baskara: ");
         double a, b, c, delta;
         double x1, x2;
         double raiz = 0;
         
         System.out.println("Digite o valor de a: ");
                 a = sc.nextDouble();
         
         System.out.println("Digite o valor de b: ");
         b = sc.nextDouble();
         
         System.out.println("Digite o valor de c: ");
         c = sc.nextDouble();
         
         delta = (b * b) - (4 * a * c);
         System.out.println(" Delta = " + delta);
         
         if (delta < 0) {
             System.out.println(" Não existe raiz real");                 
         } 
         else {
             while (raiz * raiz < delta) {
                 raiz = raiz + 0.01;
             }
             x1 = (-b + raiz)/ (2 * a);
             
             x2 = (-b + raiz) / (2 *a);
             
             System.out.println("X1 = " + x1);
             System.out.println("X2 = " + x2);
         }
          sc.close();
             
            
         
        
        
    }
}


    

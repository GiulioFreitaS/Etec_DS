/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.mavenproject1;

/**
 *
 * @author FATEC ZONA LESTE
 */
public class ExerciciosDeTpa {

    public static void main(String[] args) {
        System.out.println("Contas do exercicio de TPA");
        //numeros estabelecidos
        double Base = 10;
        double Altura = 20;
        double Lado = 5;
        double Raio = 2;
        
//calculo da area do triangulo
        double AreaDoTriangulo = (Base * Altura) / 2; //numero um vezes o numero dois divido por dois
        
//calculo da area do quadrado
        double AreaDoQuadrado = Lado * Lado; //para a area do quadrado e so fazer o lado vezes o lado e nesse caso os dois lados são iguais
        
//calculo da area do retangulo
        double AreaDoRetangulo = Base * Altura; // aqui simplesmente é so fazer a base vezes a altura

//calculo da circunferencia
        double Circunferencia = Math.PI * Raio * Raio; //eu usei esse math.pi por que na minha pesquisa esse seria o valor de PI e para eu fazer o quadrado eu fiz raio vezes raio

//calculo da media
 double num1 = 5;
 double num2 = 4;
 double num3 = 3;
   
    double media = (num1 + num2 + num3) / 3; // para a média eu fiz o valor dos numeros do 1 ao 3 e dividi pelo total de variaveis
    
//Calculo da area do losangulo
 double DiagonalMaior = 20;
 double DiagonalMenor = 10;
    
    double AreaDoLosangulo = (DiagonalMaior * DiagonalMenor) / 2; //Mesa coisa do q com a area do triangulo porem aqui eu fiz com as diagoniais dadas do losangulo
    
    
    //RESULTADOS DAS CONTAS
    System.out.println("A área do triangulo é:" + AreaDoTriangulo);
    System.out.println("A área do quadrado é:" + AreaDoQuadrado);
    System.out.println("A área do retangulo é:" + AreaDoRetangulo);
    System.out.println("A circunferência é:" + Circunferencia);
    System.out.println("A média é:" + media);
    System.out.println("A área do losangulo é:" + AreaDoLosangulo);
    
         
        
        
                
          
                }
}

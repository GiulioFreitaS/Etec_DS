

package com.mycompany.calculogeometria;


import java.util.Scanner;

public class Pedido {

    public void escolha(){

        Scanner sc = new Scanner(System.in);
        CalculoGeometria calc = new CalculoGeometria();
        Saida saida = new Saida();

        System.out.println("Escolha a área:");
        System.out.println("1 - Quadrado");
        System.out.println("2 - Retângulo");
        System.out.println("3 - Círculo");

        int op = sc.nextInt();

        if(op == 1){
            System.out.println("Digite o lado:");
            double lado = sc.nextDouble();
            double area = calc.quadrado(lado);
            saida.mostrarResultado(area);
        }

        if(op == 2){
            System.out.println("Digite a base:");
            double base = sc.nextDouble();
            System.out.println("Digite a altura:");
            double altura = sc.nextDouble();
            double area = calc.retangulo(base, altura);
            saida.mostrarResultado(area);
        }

        if(op == 3){
            System.out.println("Digite o raio:");
            double raio = sc.nextDouble();
            double area = calc.circulo(raio);
            saida.mostrarResultado(area);
        }

    }
}   
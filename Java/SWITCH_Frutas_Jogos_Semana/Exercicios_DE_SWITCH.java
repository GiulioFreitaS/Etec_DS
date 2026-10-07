package com.mycompany.exercicios_de_switch;
import java.util.Scanner;

public class Exercicios_DE_SWITCH {
    public static void main(String[] args) {
        try (Scanner sc = new Scanner (System.in)) {
            
          System.out.println ("Digite um numero de 1 a 5 (Digite 0 para encerrar o programa)");
            int resposta = sc.nextInt();


            switch (resposta) {
                case 0:
                System.out.println("Encerrando o sistema...");
                break;
                
                case 1:
                System.out.println("Laranja");
                    
                    break;

                    case 2:
                    System.out.println("Pêra");
                    break;

                    case 3:
                    System.out.println("Melancia");
                    break;

                    case 4:
                    System.out.println("Banana");
                    break;

                    case 5:
                    System.out.println("Goiaba");
                default:
                System.out.println("Invalido");
                    break;
            }
            System.out.println("Digite de 1-5 para descobrir seu jogo favorito.");
            int jogo = sc.nextInt();
            switch (jogo) {
                case 1:
                    System.out.println("Free fire");
                    break;
                case 2:
                    System.out.println("overwatch 2");
                    break;
                case 3:
                    System.out.println("Roblox");
                    break;
                case 4:
                    System.out.println("EA FC 25");
                    break;
                case 5:
                    System.out.println("Minecraft");
                    break;
                default:
                    System.out.println("Numero invalido.");
            }
            System.out.println("Digite 1-7 para o dia da semana");
            int Dia = sc.nextInt();
            switch (Dia) {
                case 1:
                    System.out.println("Domingo");
                    break;
                case 2:
                    System.out.println("Segunda-Feira");
                    break;
                case 3:
                    System.out.println("Terça-Feira");
                    break;
                case 4:
                    System.out.println("Quarta-Feira");
                    break;
                case 5:
                    System.out.println ("Quinta-Feira");
                    break;
                case 6:
                    System.out.println("Sexta-Feira");
                    break;
                case 7:
                    System.out.println("Sabado");
                    break;
                default:
                    System.out.println("Numero invalido");
            }
                    
          }
        }
    }

            

                    
    


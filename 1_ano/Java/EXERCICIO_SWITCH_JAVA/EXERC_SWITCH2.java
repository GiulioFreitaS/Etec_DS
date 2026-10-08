package  com.mycompany.exerc_switch2;

import java.util.Scanner;

public class EXERC_SWITCH2 {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Iniciando a Calculadora de Tarifas de Transporte...");
        calculadoraTarifas(scanner);

        System.out.println("\nIniciando o Simulador de Atendimento Bancário...");
        atendimentoBancario(scanner);

        System.out.println("\nIniciando o Classificador de Faixa Etária...");
        classificadorFaixaEtaria(scanner);

        System.out.println("\nTodos os programas foram executados.");
        scanner.close();
    }

    public static void calculadoraTarifas(Scanner scanner) {
        System.out.println("\n--- Calculadora de Tarifas de Transporte ---");
        System.out.println("Escolha o tipo de transporte:");
        System.out.println("1 - Ônibus urbano");
        System.out.println("2 - Metrô");
        System.out.println("3 - Trem intermunicipal");
        System.out.println("4 - Ônibus rodoviário");

        int tipo = scanner.nextInt();
        System.out.print("Digite a quantidade de bilhetes: ");
        int quantidade = scanner.nextInt();

        double tarifa;

        switch (tipo) {
            case 1:
                tarifa = 4.40;
                break;
            case 2:
                tarifa = 5.00;
                break;
            case 3:
                tarifa = 6.50;
                break;
            case 4:
                tarifa = 12.00;
                break;
            default:
                System.out.println("Erro: Tipo de transporte inválido.");
           return;
        }

        double total = tarifa * quantidade;
        System.out.printf("Valor total: R$ %.2f\n", total);
    }

    public static void atendimentoBancario(Scanner scanner) {
        System.out.println("\n--- Simulador de Atendimento Bancário ---");
        double saldo = 1000.00;
        int opcao;

        do {
            System.out.println("\nMenu de atendimento:");
            System.out.println("1 - Consultar saldo");
            System.out.println("2 - Sacar dinheiro");
            System.out.println("3 - Depositar dinheiro");
            System.out.println("4 - Encerrar atendimento");
            System.out.print("Escolha uma opção: ");
            opcao = scanner.nextInt();

            switch (opcao) {
                case 1:
                    System.out.printf("Saldo atual: R$ %.2f\n", saldo);
                    break;
                case 2:
                    System.out.print("Digite o valor para saque: ");
                    double saque = scanner.nextDouble();
                    if (saque > saldo) {
                        System.out.println("Erro: saldo insuficiente.");
                    } else {
                        saldo -= saque;
                        System.out.printf("Saque realizado. Novo saldo: R$ %.2f\n", saldo);
                    }
                    break;
                case 3:
                    System.out.print("Digite o valor para depósito: ");
                    double deposito = scanner.nextDouble();
                    saldo += deposito;
                    System.out.printf("Depósito realizado. Novo saldo: R$ %.2f\n", saldo);
                    break;
                case 4:
                    System.out.println("Encerrando atendimento.");
                    break;
                default:
                    System.out.println("Operação não existe. Tente novamente.");
            }
        } while (opcao != 4);
    }

    public static void classificadorFaixaEtaria(Scanner scanner) {
        System.out.println("\n--- Classificador de Faixa Etária ---");
        System.out.print("Digite sua idade: ");
        int idade = scanner.nextInt();

        int faixa;

        if (idade >= 0 && idade <= 12) {
            faixa = 1;
        } else if (idade >= 13 && idade <= 17) {
            faixa = 2;
        } else if (idade >= 18 && idade <= 59) {
            faixa = 3;
        } else if (idade >= 60) {
            faixa = 4;
        } else {
            System.out.println("Idade inválida.");
            return;
        }

        switch (faixa) {
            case 1:
                System.out.println("Você é uma criança (0-12 anos).");
                break;
            case 2:
                System.out.println("Você é um adolescente (13-17 anos).");
                break;
            case 3:
                System.out.println("Você é um adulto (18-59 anos).");
                break;
            case 4:
                System.out.println("Você é um idoso (60+ anos).");
                break;
        }
    }
}

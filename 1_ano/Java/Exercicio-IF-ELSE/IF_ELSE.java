/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.if_else;

import javax.swing.JOptionPane;

public class IF_ELSE {
    public static void main(String[] args) {
        int opcao = 0;
        
        while (opcao != 3) {
            opcao = Integer.parseInt(JOptionPane.showInputDialog(
                "Digite:\n" +
                "1 para Maioridade\n" +
                "2 para IMC\n" +
                "3 para Sair"));
            
            if (opcao == 1) {
                int idade = Integer.parseInt(JOptionPane.showInputDialog("Digite idade:"));
                if (idade >= 18) {
                    JOptionPane.showMessageDialog(null, "Maior");
                } else {
                    JOptionPane.showMessageDialog(null, "Menor");
                }
            } 
            else if (opcao == 2) {
                double peso = Double.parseDouble(JOptionPane.showInputDialog("Peso (kg):"));
                double altura = Double.parseDouble(JOptionPane.showInputDialog("Altura (m):"));
                double imc = peso / (altura * altura);
                
                if (imc < 18.5) {
                    JOptionPane.showMessageDialog(null, "Abaixo: " + imc);
                } 
                else if (imc < 25) {
                    JOptionPane.showMessageDialog(null, "Normal: " + imc);
                } 
                else if (imc < 30) {
                    JOptionPane.showMessageDialog(null, "Sobrepeso: " + imc);
                } 
                else {
                    JOptionPane.showMessageDialog(null, "Obeso: " + imc);
                }
            }
        }
        JOptionPane.showMessageDialog(null, "Fim");
    }
}
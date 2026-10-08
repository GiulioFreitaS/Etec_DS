/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package tiposprimitivos;

/**
 *
 * @author FATEC ZONA LESTE
 */
public class TiposPrimitivos {

    public static void main(String[] args) {
        // Variáveis com tema de carro e viagem
        byte idadeCarro = 5;                        // idade do carro em anos
        short anoFabricacao = 2020;                 // ano de fabricação
        int kmRodados = 45000;                      // quilometragem total
        long distanciaAteLua = 384400000L;          // distância aproximada até a Lua em metros

        float consumoCombustivel = 12.5f;           // km por litro
        double precoCarro = 79999.99;               // valor em reais

        char categoria = 'A';                       // categoria de habilitação exigida
        boolean revisaoEmDia = true;                // revisão feita ou não

        // Exibição dos valores
        System.out.println("Idade do carro: " + idadeCarro + " anos");
        System.out.println("Ano de fabricação: " + anoFabricacao);
        System.out.println("Km rodados: " + kmRodados + " km");
        System.out.println("Distância até a Lua: " + distanciaAteLua + " m");
        System.out.println("Consumo: " + consumoCombustivel + " km/L");
        System.out.println("Preço do carro: R$" + precoCarro);
         System.out.println("Categoria exigida: " + categoria);
        System.out.println("Revisão em dia? " + revisaoEmDia);
    }
    
}

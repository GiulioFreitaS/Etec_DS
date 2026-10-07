
import java.io.*;

public class GerenciadorDeUsuarios {

private final String ARQUIVO = "usuarios.txt";

public void Cadastrar (String nome, String senha) {

    try {
        FileWriter fw = new FileWriter(ARQUIVO, true);
        BufferedWriter bw = new BufferedWriter(fw);

        bw.write(nome + "--" + senha);
        bw.newLine();

        bw.close();


    } catch (IOException erro) {

        System.out.println("Erro ao cadastrar usuario.");


    }
}

    public boolean login (String nome, String senha){

try {
    BufferedReader br =
             new BufferedReader(new FileReader(ARQUIVO));

                String linha;
                while ((linha = br.readLine()) != null){

                     String[] partes = linha.split(";");

                     if (partes[0].equals(nome)
                         && partes[1].equals(senha)) {

                 br.close();

                 return true;
                     }
                   }

                br.close();
}
  catch(IOException erro){
     System.out.println("erro ao ler arquivo.");
  }

return false;

    }
}

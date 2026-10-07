import javax.swing.*;

public class TelaLogin extends JFrame {

JButton btnLogin = new JButton("Login");
JButton btnCadastro = new JButton("Cadastrar");
//---------------//
JTextField campoUsuario = new JTextField();
JPasswordField campoSenha = new JPasswordField();
//--------------//
JLabel lblUsuario = new JLabel("Usuário:");
JLabel lblSenha = new JLabel("Senha:");


GerenciadorDeUsuarios gerenciador = new GerenciadorDeUsuarios();

public TelaLogin(){
//setando a tela
    setTitle("Sistema de Login");
    setSize(350, 250);
    setLayout(null);
    setDefaultCloseOperation(EXIT_ON_CLOSE);
    setLocationRelativeTo(null);



    //Aonde os objetos vão ficar dentro da tela (JLabel, Textfield, Password  e JButton)

    lblUsuario.setBounds(40, 30, 100, 30);
    add(lblUsuario);

    campoUsuario.setBounds(120, 30, 150, 30);
    add(campoUsuario);

    lblSenha.setBounds(40, 80, 100, 30);
    add(lblSenha);

    campoSenha.setBounds(120, 80, 150, 30);
    add(campoSenha);

    btnLogin.setBounds(40, 140, 100, 40);
    add(btnLogin);

    btnCadastro.setBounds(170, 140, 100, 40);
    add(btnCadastro);


    //adicionando ação para os botões


    btnCadastro.addActionListener(
            e -> cadastrar()
    );

    btnLogin.addActionListener(
            e -> login()
    );

    setVisible(true);



}


    public void cadastrar(){

    String usuario = new String(campoUsuario.getText());
    String senha = new String (campoSenha.getPassword());

    gerenciador.Cadastrar(usuario, senha);

    JOptionPane.showMessageDialog(null, "Usuario Cadastrado");

    }

    public void login(){

    String usuario = new String(campoUsuario.getText());
    String senha = new String(campoSenha.getPassword());

    boolean sucesso = gerenciador.login(usuario,senha);

    if (sucesso){

        JOptionPane.showMessageDialog(null ,"Login realizado com sucesso.");


    }
    else {
        JOptionPane.showInputDialog(null ,"Usuario ou senha invalidos!");
    }
    }




    }


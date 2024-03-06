-- SQLBook: Code

use teste;
create table variacaoDescricao(
	id int auto_increment not null,
	descricao varchar(50),
    primary key(id)
);


create table variacaoValor(
	id int auto_increment not null,
    valor varchar(100),
	
    idVariacaoDescricao int,
    primary key(id),
	foreign key (idVariacaoDescricao) references variacaoDescricao(id)
);

create table tipoUsuario(
	id int auto_increment not null,
    descricao varchar(50),
	primary key(id)
);

create table usuario(
	id int auto_increment not null,
    nome varchar(50),
    indentidade varchar(50),
    email varchar(50),
    senha varchar(40),
    
    idTipoUsuario int,
    primary key(id),
    foreign key(idTipoUsuario) references tipoUsuario(id)
);

create table endereco(
	id int auto_increment not null,
    pais varchar(50),
    estado varchar(50),
    cidade varchar(50),
    bairro varchar(50),
    rua varchar(50),
    numero varchar(50),
    logradouro varchar(50),
    
	idUsuario int,
    primary key(id),
    foreign key(idUsuario) references usuario(id)
);

create table loja(
	id int auto_increment not null,
    nome varchar(50),
    logo varchar(50),
    banner varchar(50),
    qtdproduto varchar(50),
    corfundo varchar(50),
    corfonte varchar(50),
    area varchar(50),
    cnpj varchar(50),
    
    
    idUsuario int,
    primary key(id),
    foreign key(idUsuario) references usuario(id)
);


create table produto(
	id int auto_increment not null,
    qtde int,
    valor double,
    modelo varchar(50),
    idv1 int,
    idv2 int,
    idloja int,
    
    primary key(id),
    foreign key(idV1) references variacaoValor(id),
    foreign key(idV2) references variacaoValor(id),
	foreign key(idloja) references loja(id)
);

create table categoria(
	id int auto_increment not null,
    nome varchar(60),
	descricao varchar(60),
    primary key(id)
);

create table subcategoria(
	id int auto_increment not null,
    descricao varchar(50),
    
    idCategoria int,
     primary key(id),
    foreign key(idCategoria) references categoria(id)
);

create table subProduto(
	id int auto_increment not null,
	idProduto int,
    idSubCat int,
    
    
    primary key(id),
	foreign key(idProduto) references produto(id),
	foreign key(idSubCat) references subcategoria(id)
);

create table itemPedido(
	id int auto_increment not null,
    qtdePedida int,
    qtdeAtendida int,
    valorItem double,
    
	idProduto int,
    primary key(id),
	foreign key(idProduto) references produto(id)
);


create table pedido(
	id int auto_increment not null,
    valorTotal double,
    datap datetime,
    statusp int,
    valorFinal double,
    desconto double,
    idUsuario int,
    primary key(id),
    foreign key(idUsuario) references usuario(id)
);

create table pagamento(
	id int auto_increment not null,
    datap datetime,
    valor double,
    operacao int,
    statusp int, 
    idPedido int,
    
    primary key(id),
    foreign key(idPedido) references pedido(id)
    
); 
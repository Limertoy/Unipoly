window.onload = function () {
    var rollButton = document.getElementById("rollButton");
    rollButton.onclick = Game.takeTurn;

    Game.populateBoard();
};

var Game = (function () {

    var game = {};

    game.squares = [
        new Square("KSERO", 550, "square2"),
        new Square("SZANSA", 0, "square3", "chance"),
        new Square("DRUK", 200, "square4"),
        new Square("UBEZPIECZENIE", 1000, "square5", "fine"),
        new Square("NAUKI HUMAN.", 300, "square6"),
        new Square("PUSTO", 350, "square7"),
        new Square("SZANSA", 400, "square8", "chance"),
        new Square("PUSTO", 450, "square9"),
        new Square("PUSTO", 500, "square10"),
        new Square("NEURON", 600, "square12"),
        new Square("BUR", 100, "square13"),
        new Square("KAUKAZ", 150, "square14"),
        new Square("MECHATRON", 200, "square15"),
        new Square("NAUKI MEDYCZNE", 250, "square16"),
        new Square("MUR", 300, "square17"),
        new Square("SZANSA", 350, "square18", "chance"),
        new Square("UTW", 400, "square19"),
        new Square("LICEUM", 450, "square20"),
        new Square("MOST", 550, "square22"),
        new Square("NAWA", 0, "square23"),
        new Square("SZANSA", 200, "square24", "chance"),
        new Square("ERASMUS+", 250, "square25"),
        new Square("NAUKI PRZYR.", 300, "square26"),
        new Square("ĆWICZENIA", 350, "square27"),
        new Square("LABORATORIA", 400, "square28"),
        new Square("WU", 450, "square29"),
        new Square("WYKŁAD", 500, "square30"),
        new Square("FILON", 600, "square32"),
        new Square("SZANSA", 100, "square33", "chance"),
        new Square("LAURA", 150, "square34"),
        new Square("OLIMP", 200, "square35"),
        new Square("NAUKI SPOŁ.", 250, "square36"),
        new Square("SZANSA", 300, "square37", "chance"),
        new Square("TARGI PRACY", 350, "square38"),
        new Square("IMPREZA", 1500, "square39", "fine"),
        new Square("KULTURALIA", 450, "square40"),


    ];

    // game.players = [
    //     new Player("Stan", 1000, "Triangle", "player1"),
    //     new Player("Ike", 1000, "Circle", "player2")
    // ];


    game.currentPlayer = 0;

    game.populateBoard = function () {
        for (var i = 0; i < this.squares.length; i++) {
            var id = this.squares[i].squareID;
            var squareName = document.getElementById(id + "-name");
            squareName.innerHTML = this.squares[i].name;

            if (this.squares[i].type != "chance" && this.squares[i].type != "fine") {
                var squareValue = document.getElementById(id + "-value");
                var squareOwner = document.getElementById(id + "-owner");
                squareValue.innerHTML = this.squares[i].value + "zł";
                squareOwner.innerHTML = this.squares[i].owner;
            }
        }

        var square1 = document.getElementById("square1-residents");
        // for (var i = 0; i < game.players.length; i++) {
        //     game.players[i].createToken(square1);
        // }
    };


    game.takeTurn = function () {

        movePlayer();


        checkTile();

        if (game.players[game.currentPlayer].cash < 0) {
            alert("Sorry " + game.players[game.currentPlayer].name + ", you lose!");
        }

        game.currentPlayer = nextPlayer(game.currentPlayer);

        updateByID("currentTurn", game.players[game.currentPlayer].name);
    };

    /****                    Game-level private functions                        *****/
    function nextPlayer(currentPlayer) {
        var nextPlayer = currentPlayer + 1;

        if (nextPlayer == game.players.length) {
            return 0;
        }

        return nextPlayer;
    }

    function movePlayer() {
        var moves = Math.floor(Math.random() * (12 - 1) + 1);

        var totalSquares = game.squares.length + 1;

        var currentPlayer = game.players[game.currentPlayer];
        var currentSquare = parseInt(currentPlayer.currentSquare.slice(6));

        if (currentSquare + moves <= totalSquares) {
            var nextSquare = currentSquare + moves;
        } else {
            var nextSquare = currentSquare + moves - totalSquares;
            currentPlayer.updateCash(currentPlayer.cash + 100);
            console.log("$100 for passing start");
        }

        currentPlayer.currentSquare = "square" + nextSquare;

        var currentToken = document.getElementById(currentPlayer.id);
        currentToken.parentNode.removeChild(currentToken);

        currentPlayer.createToken(
            document.getElementById(currentPlayer.currentSquare)
        );
    }

    function checkTile() {
        var currentPlayer = game.players[game.currentPlayer];
        var currentSquareId = currentPlayer.currentSquare;
        var currentSquareObj = game.squares.filter(function (square) {
            return square.squareID == currentSquareId;
        })[0];

        if (currentSquareId == "square1") {
            currentPlayer.updateCash(currentPlayer.cash + 100);
            updateByID(
                "messagePara",
                currentPlayer.name + ": You landed on start. Here's an extra $100"
            );
        } else if (currentSquareObj.owner == "For Sale") {
            if (currentPlayer.cash <= currentSquareObj.value) {
                updateByID(
                    "messagePara",
                    currentPlayer.name +
                    ": Sorry, you can't afford to purchase this property"
                );
                return;
            }

            var purchase = window.confirm(
                currentPlayer.name +
                ": This property is unowned. Would you like to purchase this property for $" +
                currentSquareObj.value +
                "?"
            );

            if (purchase) {
                currentSquareObj.owner = currentPlayer.id;
                currentPlayer.updateCash(currentPlayer.cash - currentSquareObj.value);
                updateByID(
                    "messagePara",
                    currentPlayer.name + ": you now have $" + currentPlayer.cash
                );
                updateByID(
                    currentSquareObj.squareID + "-owner",
                    "Owner: " + game.players[game.currentPlayer].name
                );
            }
        } else if (currentSquareObj.owner == currentPlayer.id) {
            updateByID(
                "messagePara",
                currentPlayer.name + ": You own this property. Thanks for visiting!"
            );
        } else {
            updateByID(
                "messagePara",
                currentPlayer.name +
                ": This property is owned by " +
                currentSquareObj.owner +
                ". You owe $" +
                currentSquareObj.rent +
                ". You now have $" +
                currentPlayer.cash
            );

            var owner = game.players.filter(function (player) {
                return player.id == currentSquareObj.owner;
            });
            currentPlayer.updateCash(currentPlayer.cash - currentSquareObj.rent);
        }
    }

    function updateByID(id, msg) {
        document.getElementById(id).innerHTML = msg;
    }

    function Square(name, value, squareID, type) {
        this.name = name;
        this.value = value;
        this.rent = value * 0.3;
        this.squareID = squareID;
        this.owner = "";
        this.type = type;
    }

    function Player(name, cash, token, id) {
        this.name = name;
        this.cash = cash;
        this.token = token;
        this.id = id;
        this.currentSquare = "square1";
        this.ownedSquares = [];
    }

    Player.prototype.createToken = function (square) {
        var playerSpan = document.createElement("span");
        playerSpan.setAttribute("class", this.token);
        playerSpan.setAttribute("id", this.id);
        square.appendChild(playerSpan);
    };

    Player.prototype.updateCash = function (amount) {
        document.getElementById(this.id + "-info_cash").innerHTML = amount;
        this.cash = amount;
    };

    return game;
})();

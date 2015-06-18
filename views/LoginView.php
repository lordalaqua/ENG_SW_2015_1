<!doctype html>
<html>
    <head>
        <title>Aluguel Universitário</title>
        <meta charset='UTF-8'>
        <meta name="viewport' content='width=device-width, initial-scale=1">
    </head>

    <body>
        <header>
            <h1>Aluguel Universitário</h1>
            <nav>
                <a href="/">[Home]</a>
            </nav>
        </header>
        <main>
            <form role="form" method="POST" action="/login" id="form">
                <div>
                    <label for="email">Email:</label>
                    <input type="text" name="email">
                </div>
                <div>
                    <label for="password">Senha:</label>
                    <input type="password" name="password">
                </div>
                <div>
                <button type="submit"> Login </button>
                </div>
            </form>
        </main>

    </body>
</html>
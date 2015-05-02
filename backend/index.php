<?php require('./functions.php'); ?>
<!doctype html>
<html>
    <head>
        <title>Simple Library App</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
    </head>
    <body>
       
        <header>
            <h1 class="container">Simple Library App</h1>
        </header>

        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#books-all">All Books</a></li>
                <li><a data-toggle="tab" href="#books-popular">Popular Books</a></li>
                <li><a data-toggle="tab" href="#recent-checkouts">Recent Checkouts</a></li>
                <li><a data-toggle="tab" href="#new-checkout"> New Checkout</a></li>
            </ul>
            <div class="tab-content">
                <!--Tab 1-->
                <div id="books-all" class="tab-pane active">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (getBooks() as $book) : ?>
                                <tr>
                                    <td><?php echo esc_html($book['title']); ?></td>
                                    <td><?php echo esc_html($book['author']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!--Tab 2-->
                <div id="books-popular" class="tab-pane">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th># Checkouts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (getBooksPopular() as $book) : ?>
                                <tr>
                                    <td><?php echo esc_html($book['title']); ?></td>
                                    <td><?php echo esc_html($book['author']); ?></td>
                                    <td><?php echo esc_html($book['count']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!--Tab 3-->
                <div id="recent-checkouts" class="tab-pane">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Checkout Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (getBooksRecent() as $book) : ?>
                                <tr>
                                    <td><?php echo esc_html($book['title']); ?></td>
                                    <td><?php echo esc_html($book['author']); ?></td>
                                    <td><?php echo esc_html($book['timestamp']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!--Tab 4-->
                <div id="new-checkout" class="tab-pane">
                    <form id='checkout' action="checkout.php" method="POST">
					    <br/>
						<div id="message"></div>
                        <table class="table table-striped">
                            <tr>
                                <td>Name*</td>
                                <td><input type="text" name="name" id="name"></td>
                            </tr>
                            <tr>
                                <td>Email*</td>
                                <td><input type="text" name="email" id="email"></td>
                            </tr>
                            <tr>
                                <td>Phone*</td>
                                <td>
                                    <input type="text" name="code" id="code" size=3 maxlength=3 onkeypress='return isNumberKey(event)' placeholder='Code'>
								    <input type="text" name="phone" id="phone" maxlength=11 onkeypress='return isNumberKey(event)'>
                                </td>
                            </tr>
                            <tr>
                                <td>Book ID*</td>
                                <td>
                                    <select name="book_id" id="book_id">
                                        <?php foreach (getBookId() as $book) : ?>
                                            <option value='<?php echo esc_html($book['book_id']); ?>'><?php echo esc_html($book['title']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Checkout" name="add_new" id="add_new"></td>
                            </tr>

                        </table>
                    </form>
                </div><!--End Tap 4-->

            </div><!--End tab Content-->

        </div><!--End Container-->

        <footer>
        </footer>
        <script src="js/jquery-2.1.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/checkout.js"></script>

    </body>
</html>
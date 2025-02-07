<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Kategori Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            echo mysqli_num_rows($koneksi->query("SELECT * FROM kategori"))
                                ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-table fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Koleksi Buku</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            echo mysqli_num_rows($koneksi->query("SELECT * FROM buku"))
                                ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Genre Film -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Genre Film</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            echo mysqli_num_rows($koneksi->query("SELECT * FROM genre"))
                                ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-table fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Film -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Koleksi Film</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            echo mysqli_num_rows($koneksi->query("SELECT * FROM film"))
                                ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-film fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow h-100 py-3">
                <div class="card-body">
                    <p class="text-gray-800">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam, adipisci laudantium nihil
                        molestias debitis ut aspernatur nisi ex inventore quo? Porro error deleniti praesentium
                        delectus, aut in itaque alias, quod exercitationem assumenda natus! Repudiandae suscipit
                        recusandae dolor quo eligendi atque debitis cupiditate aspernatur amet consequuntur optio
                        doloribus dolorem eaque explicabo eius, excepturi ullam facere possimus distinctio nostrum.
                        Doloremque perferendis nisi iusto illo provident quam saepe necessitatibus error. Perferendis
                        illo ratione dignissimos sit, corporis excepturi iusto, cupiditate odit aliquid repudiandae
                        laborum voluptate dolore ad cum, error harum! Quae sit iste vel in. Aliquid facilis, modi
                        perspiciatis tempore facere nesciunt, rerum sint tempora cum obcaecati deserunt natus soluta
                        sit. Beatae commodi consectetur maiores quas. Ipsa soluta quam in nesciunt cumque. Quas,
                        incidunt illum fugit quos harum labore reprehenderit esse quae magnam alias quaerat eos illo
                        maiores repellendus debitis quidem itaque, asperiores atque laborum ab, voluptate ducimus
                        molestiae. Delectus cumque id ipsam illum, facilis dolore. Tempore nemo possimus repudiandae
                        officia ratione, at dicta distinctio odio ab, assumenda numquam sit, voluptatem inventore enim
                        quidem provident veritatis quod? Explicabo incidunt, at expedita asperiores dignissimos rem
                        architecto veniam nobis laudantium, quod saepe aliquam laboriosam beatae? Eaque mollitia
                        nesciunt alias! Commodi, veniam distinctio numquam iusto magni accusamus esse adipisci officiis
                        voluptates eligendi rerum libero totam, consequatur quos exercitationem praesentium? Dignissimos
                        minima placeat suscipit quisquam iste quam voluptatum. Quo, fugit necessitatibus sequi,
                        obcaecati deserunt, perferendis esse voluptatibus delectus possimus blanditiis iure. Facere,
                        adipisci illum minus laboriosam, modi et at repudiandae debitis harum vel non? Odio, quos
                        mollitia doloremque, repellendus laboriosam sed blanditiis quisquam excepturi soluta sapiente
                        adipisci! Architecto illo quasi officiis fuga earum! Rerum, nostrum autem quibusdam itaque, quis
                        et odit doloremque sint at ut libero cum earum ad molestias distinctio pariatur totam dolorum
                        asperiores suscipit fuga illo. Tempora reiciendis, debitis perspiciatis doloremque illo culpa
                        molestias numquam sunt. Delectus non ad ipsum quaerat, reprehenderit, necessitatibus illum
                        aspernatur blanditiis libero praesentium facilis accusamus quae nesciunt optio. Accusamus,
                        tempore! Neque aspernatur iusto repellat iste dolore autem, aliquam, est pariatur explicabo
                        laudantium incidunt dolorem, eius voluptate non temporibus a repellendus animi enim nisi
                        deleniti. Cum culpa id nisi accusantium magni vel, sapiente mollitia dolorem ullam est.
                        Excepturi inventore praesentium commodi delectus perspiciatis, magnam beatae mollitia natus
                        rerum voluptates repudiandae ipsam, molestiae velit nisi suscipit aliquid dicta adipisci odit
                        unde aut vero? Accusantium obcaecati in cumque possimus. Voluptatum, sequi deserunt in, fuga
                        dicta maiores reiciendis, nostrum cupiditate vel esse officia similique dignissimos.
                    </p>
                </div>
            </div>
        </div>
    </div>
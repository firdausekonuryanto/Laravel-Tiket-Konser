TIket Konser is one of simple application with laravel as framework. this app use to admin validation of ticket who audience will come to musik party. admin will check ticket if audience has validated and entered the room, ticket status cannot use for twice.

Schema of tickets
 Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->text('id_tiket');
            $table->unsignedBigInteger('id_penonton')->nullable();
            $table->integer('sts_pemakaian');
            $table->timestamps();
        });

        Schema::table('tikets', function (Blueprint $table) {
            $table->foreign('id_penonton')
                ->references('id_user')
                ->on('penontons')
                ->onDelete('cascade');
        });
-----------------------------------------------------------------------
Schema of penontons
Schema::create('penontons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->string('name');
            $table->string('gender');
            $table->text('address');
            $table->string('phone');
            $table->text('email');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
-----------------------------------------------------------------------
Schema of users
  Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->integer('level_user');
            $table->rememberToken();
            $table->timestamps();
        });
thanks, we hope can help anybody.

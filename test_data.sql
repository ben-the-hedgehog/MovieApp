insert into user(password, fname, lname, email, cc_number, cc_expiry)
  values(111, "Jon", "Snow", "jsnizzle@nightswatch.com", 123, 456);
insert into user(password, fname, lname, email, cc_number, cc_expiry)
  values(111, "Arya", "Stark", "noone@facelessmen.net", 123, 456);
insert into user(password, fname, lname, email, cc_number, cc_expiry)
  values(111, "xyz", "abc", "someone@example.com", 123, 456);
insert into user(password, fname, lname, email, cc_number, cc_expiry)
  values(111, "xyz", "abc", "someone2@example.com", 123, 456);

insert into movie(title, rating, running_time, director, prod_cpny)
  values("Shrek", "E", 120, "Johnny Appleseed", "Company X");
insert into movie(title, rating, running_time, director, prod_cpny)
  values("Shrek 2", "E", 120, "Johnny Appleseed", "Company X");
insert into movie(title, rating, running_time, director, prod_cpny)
  values("Shrek 3", "E", 120, "Johnny Appleseed", "Company X");
insert into movie(title, rating, running_time, director, prod_cpny)
  values("Shrek 4", "E", 120, "Johnny Appleseed", "Company X");

insert into complex(city, name, address, phone_num)
  values("Kingston", "Cineplex", "123 idk drive", "1234567");
insert into complex(city, name, address, phone_num)
  values("Kingston", "Landmark", "345 idk drive", "1234567");
insert into complex(city, name, address, phone_num)
  values("Toronto", "SilverCity", "123 xdd drive", "1234567");
insert into complex(city, name, address, phone_num)
  values("Wakanda", "Super Theatre Wowza", "345 asdf blvd", "1234567");

insert into theatre(complex, theatre_num, screen_size, num_seats)
  values(1, 1, 'L', 100);
insert into theatre(complex, theatre_num, screen_size, num_seats)
  values(1, 2, 'L', 100);
insert into theatre(complex, theatre_num, screen_size, num_seats)
  values(2, 1, 'S', 100);
insert into theatre(complex, theatre_num, screen_size, num_seats)
  values(3, 7, 'L', 100);

insert into showtime(movie, theatre, start_time, seats_left)
  values(1, 1, "1000-01-01 00:00:00", 100);
insert into showtime(movie, theatre, start_time, seats_left)
  values(1, 2, "1000-01-01 00:00:00", 100);
insert into showtime(movie, theatre, start_time, seats_left)
  values(2, 4, "1000-01-01 00:00:00", 100);
insert into showtime(movie, theatre, start_time, seats_left)
  values(3, 3, "1000-01-01 00:00:00", 100);
insert into showtime(movie, theatre, start_time, seats_left)
  values(4, 1, "1000-01-01 00:00:00", 100);
insert into showtime(movie, theatre, start_time, seats_left)
  values(1, 3, "1000-01-01 00:00:00", 100);

insert into now_playing(complex, movie, start_date, end_date)
  values(1, 1, "1000-01-01", "2018-04-01");
insert into now_playing(complex, movie, start_date, end_date)
  values(2, 1, "1000-01-01", "2018-04-01");
insert into now_playing(complex, movie, start_date, end_date)
  values(1, 2, "1000-01-01", "2018-04-01");
insert into now_playing(complex, movie, start_date, end_date)
  values(1, 3, "1000-01-01", "2018-04-01");
insert into now_playing(complex, movie, start_date, end_date)
  values(3, 1, "1000-01-01", "2018-04-01");
insert into now_playing(complex, movie, start_date, end_date)
  values(3, 2, "1000-01-01", "2018-04-01");
insert into now_playing(complex, movie, start_date, end_date)
  values(2, 4, "1000-01-01", "2018-04-01");

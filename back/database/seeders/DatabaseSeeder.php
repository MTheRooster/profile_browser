<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::factory(5)->create();

        User::find(1)->update([
            'name' => 'Michel',
            'email' => 'michel@michel.com'
        ]);

         Profile::factory()->createMany([
            [
                'id'=> 1,
                'user_id'=>1,
                'firstname'=> "Angelina",
                'lastname'=> "Jolie",
                'biography'=>
                  "Angelina Jolie, née le 4 juin 1975 à Los Angeles, est une actrice, réalisatrice, scénariste, productrice, mannequin, écrivaine et ambassadrice de bonne volonté américano-cambodgienne. Elle a reçu trois Golden Globes, deux Screen Actors Guild Awards et un Oscar du cinéma. Elle commence sa carrière d'actrice avec le film à petit budget Cyborg 2 (1993), tandis qu'elle n'est âgée que de 18 ans. Son premier rôle principal dans un film important est dans Hackers, en 1995. Elle joue ensuite dans George Wallace et Femme de rêve, téléfilms biographiques acclamés par la critique. Angelina Jolie remporte un Oscar de la meilleure actrice dans un second rôle pour sa prestation dans Une vie volée (1999). L'actrice continue son ascension avec 60 Secondes Chrono (2000), qui obtient un franc succès au box-office. Elle atteint par la suite une grande notoriété avec l'interprétation de l'héroïne de jeu vidéo Lara Croft dans Lara Croft: Tomb Raider (2001) et s'impose depuis comme l'une des actrices les plus célèbres et les mieux payées d'Hollywood. Ses films les plus lucratifs ont été Mr. et Mrs. Smith (2005), Wanted (2008), Kung Fu Panda (2008), Salt (2010) et The Tourist (2010). Elle joue également dans des drames plus intimistes comme Un cœur invaincu (2007) et L'Échange (2008).",
                'imagename'=>'angelina_jolie.jpg'
            ],
            [
                'id'=> 2,
                'user_id'=>1,
                'firstname'=> "Beyonce",
                'lastname'=> "Knowles",
                'biography'=>
                  "Beyoncé , parfois appelée par son nom complet Beyoncé Knowles, voire par son nom d'épouse Beyoncé Carter, née le 4 septembre 1981 à Houston, au Texas, est une chanteuse, compositrice, danseuse, productrice de musique et actrice américaine.Elle est désignée en 2009 comme étant l'artiste de la décennie 2000 par The Guardian2, tandis que New Musical Express la voit comme l'une des artistes ayant défini la décennie 20103. En 2013, les critiques musicales du New Yorker décrivent Beyoncé comme étant la musicienne la plus populaire, la plus importante et la plus influente de ce début de xxie siècle4. En 2013, le magazine Forbes la classe 17e dans la liste des femmes les plus puissantes et 4e dans la liste des stars les plus puissantes du monde, ce qui fait d'elle la deuxième chanteuse la plus puissante au monde, derrière Lady Gaga et devant Madonna5. En 2014, elle figure en tête de la liste établie par le magazine Forbes des célébrités les plus influentes au monde6. En 2022, le magazine Rolling Stone la déclare plus grande artiste musicale de la décennie passée7.",
                'imagename'=>'beyonce.jpg'
            ],
              [
                'id'=> 3,
                'user_id'=>1,
                'firstname'=> "Jennifer",
                'lastname'=> "Aniston",
                'biography'=>
                  "Jennifer Aniston est une actrice, réalisatrice et productrice américaine née le 11 février 1969 à Los Angeles.Elle accède à la notoriété internationale en interprétant, de 1994 à 2004, le personnage de Rachel Green dans la sitcom à succès Friends. Grâce à ce rôle, elle obtient un Emmy Award, un Golden Globe Award et un Screen Actors Guild Award.",
                'imagename'=>'aniston.jpg'
              ],
              [
                'id'=> 4,
                'user_id'=>1,
                'firstname'=> "Jude",
                'lastname'=> "Law",
                'biography'=>
                  "Jude Law  est un acteur, réalisateur et producteur de cinéma britannique, né le 29 décembre 1972 à Lewisham (Londres).Révélé durant les années 1990 par Bienvenue à Gattaca (1997), eXistenZ (1998) et Le Talentueux Mr. Ripley (1999), Stalingrad (2001). Il joue ensuite dans des grandes productions hollywoodiennes : A.I. Intelligence artificielle (2001), Les Sentiers de la perdition (2002), Retour à Cold Mountain (2003) et le thriller sentimental Entre adultes consentants (2004).",
                'imagename' => 'judelaw.jpg'
              ],
              [
                'id'=> 5,
                'user_id'=>1,
                'firstname'=> "Selena",
                'lastname'=> "Gomez",
                'biography'=>
                  "Selena Gomez, née le 22 juillet 1992 à Grand Prairie, au Texas, est une chanteuse, actrice et productrice américaine.Elle fait ses débuts de comédienne dans la série pour enfants Barney & Friends (2002-2004), puis se fait connaître du jeune public en interprétant le rôle d'Alex Russo dans la série humoristique de Disney Channel, Les Sorciers de Waverly Place (2007-2012). Elle joue ensuite dans de nombreux films ou téléfilms tels que Comme Cendrillon 2 (2008), Princess Protection Program (2009), Sœurs malgré elles (Ramona et Beezus, 2010), Bienvenue à Monte-Carlo (2011), Spring Breakers (2012), Getaway (2013) et The Fundamentals of Caring (2016). Elle interprète par ailleurs la voix du personnage Mavis dans les films d'animation de la franchise Hôtel Transylvanie.",
                'imagename'=>'selenaGomez.jpeg'
              ],
              [
                'id'=> 6,
                'user_id'=>1,
                'firstname'=> "Leonardo",
                'lastname'=> "DiCaprio",
                'biography'=>
                  "Leonardo DiCaprio est un acteur, producteur, scénariste et documentariste américain, né le 11 novembre 1974 à Los Angeles.Grandissant dans les quartiers de Los Angeles de Los Feliz puis Hollywood, il prend comme modèle le fils de sa belle-mère Peggy Ann Saunders, Adam Farrar, qui commence dès l'enfance une carrière d'acteur. Il se lance lui aussi, encouragé par ses parents. Il montre rapidement un talent pour la comédie et se voit proposer des rôles à la télévision, puis au cinéma. Il est sélectionné pour jouer face à son acteur préféré Robert De Niro dans Blessures secrètes en 1993. La même année, il incarne face à Johnny Depp un jeune garçon déficient intellectuel, Gilbert Grape, rôle pour lequel il est nommé à l'Oscar du meilleur acteur dans un second rôle à l'âge de 19 ans.",
                'imagename'=> 'dicaprio.jpg'
              ],
              [
                'id'=> 7,
                'user_id'=>1,
                'firstname'=> "Megan",
                'lastname'=> "Fox",
                'biography'=>
                  "Megan Fox est une actrice et mannequin américaine, née le 16 mai 1986 à Oak Ridge (Tennessee).Elle est révélée au début des années 2000 par des rôles principaux à la télévision : Ocean Ave (2002-2003), puis la sitcom La Star de la famille (2004-2006). En 2004, elle joue avec Lindsay Lohan dans la comédie musicale à succès Le Journal intime d'une future star, puis dans le film romantique Crimes of Fashion.En 2007 elle obtient le rôle de Mikaela Banes dans le blockbuster Transformers, réalisé par Michael Bay et produit par Steven Spielberg. En 2009, elle reprend son rôle dans la suite et tient aussi le premier rôle de la comédie horrifique Jennifer's Body pour lequel elle reçoit le Teen Choice Award de la meilleure actrice et évolue ensuite aux côtés de Josh Brolin dans le film de super-héros Jonah Hex (pour lequel elle est nommée pour deux Razzie Awards). En 2010, elle est la tête d'affiche du drame Passion Play, aux côtés de Mickey Rourke.",
                'imagename'=> 'meganfox.jpg'
              ],
              [
                'id'=> 8,
                'user_id'=>1,
                'firstname'=> "Nicole",
                'lastname'=> "Kidman",
                'biography'=>
                  "Nicole Kidman est une actrice, réalisatrice, chanteuse et productrice de cinéma australo-américaine, née le 20 juin 1967 à Honolulu.Considérée comme l'une des plus grandes actrices de sa génération, alternant entre films populaires et cinéma indépendant. Elle a ainsi remporté de multiples récompenses, parmi lesquelles un Oscar, six Golden Globes, deux Emmy Awards, un BAFTA, un Ours d'argent, le prix du 70e anniversaire du Festival de Cannes, et possède une étoile sur le Hollywood Walk of Fame.",
                'imagename'=>'nicoleKidman.jpeg'
              ],
              [
                'id'=> 9,
                'firstname'=> "Robert",
                'lastname'=> "Pattinson",
                'biography'=>
                  "Robert Pattinson est un acteur, mannequin et musicien britannique, né le 13 mai 1986 à Barnes (Londres)1.Révélé durant les années 2000 par des productions destinées aux adolescents, comme la franchise Twilight (2008-2012), dans laquelle il incarne Edward Cullen aux côtés de Kristen Stewart, il se fait également connaître du grand public par son rôle de Cedric Diggory dans Harry Potter et la Coupe de feu (2005), quatrième opus de la saga Harry Potter.",
                'imagename'=>'pattinson.jpg'
              ],
              [
                'id'=> 10,
                'firstname'=> "Robert",
                'lastname'=> "RedFord",
                'biography'=>
                  "Charles Robert Redford, Jr., dit Robert Redford1, né le 18 août 1936 à Santa Monica (Californie), est un acteur, réalisateur et producteur américain.En 1969, il se fait connaître grâce au western Butch Cassidy et le Kid. Il confirme son ascension avec des films tels que Les Hommes du président, L'Arnaque, Gatsby le Magnifique, Out of Africa et L'Homme qui murmurait à l'oreille des chevaux.",
                'imagename'=>'redford.jpg'
              ],
         ]); 
    }
}

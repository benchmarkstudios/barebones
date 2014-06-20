<?php 

/* Template name: CSS Tests */

function wp_head_css_tests() {
?>
<!-- <link rel="stylesheet" href="http://basehold.it/24"> -->
<style>
body { padding: 48px 0; }
.section-title { font-size: 3em; line-height: 2em; border-bottom: solid 1px #000; }
.row { overflow: hidden; margin-bottom: 1.5em; }
.column { background-color: yellow; height: 1.5em; }
.column .column { background-color: green; }
</style>
<?php
}

add_action( 'wp_head', 'wp_head_css_tests' );

get_header();

?>

    <div class="container">
      <section>
        <h2 class="section-title">Grids</h2>
        <div class="row">
          <div class="column column-span-12"></div>
        </div>
        <div class="row">
          <div class="column column-span-6"></div>
          <div class="column column-span-6"></div>
        </div>
        <div class="row">
          <div class="column column-span-4"></div>
          <div class="column column-span-4"></div>
          <div class="column column-span-4"></div>
        </div>
        <div class="row">
          <div class="column column-span-3"></div>
          <div class="column column-span-3"></div>
          <div class="column column-span-3"></div>
          <div class="column column-span-3"></div>
        </div>
        <div class="row">
          <div class="column column-span-2"></div>
          <div class="column column-span-2"></div>
          <div class="column column-span-2"></div>
          <div class="column column-span-2"></div>
          <div class="column column-span-2"></div>
          <div class="column column-span-2"></div>
        </div>
        <div class="row">
          <div class="column column-span-1"></div>
          <div class="column column-span-1"></div>
          <div class="column column-span-1"></div>
          <div class="column column-span-1"></div>
          <div class="column column-span-1"></div>
          <div class="column column-span-1"></div>
          <div class="column column-span-1"></div>
          <div class="column column-span-1"></div>
          <div class="column column-span-1"></div>
          <div class="column column-span-1"></div>
          <div class="column column-span-1"></div>
          <div class="column column-span-1"></div>
        </div>
        <div class="row">
          <div class="column column-span-8">
            <div class="column column-span-6"></div>
            <div class="column column-span-6"></div>
          </div>
          <div class="column column-span-4"></div>
        </div>
      </section>
      <section>
        <h2 class="section-title">Typography</h2>
        <h1>Heading 1</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quaerat magni omnis vero veritatis repellendus architecto ut et! Aliquam, eligendi, culpa neque natus consequuntur expedita facilis inventore nulla dolore incidunt.</p>
        <h2>Heading 2</h2>
        <p>Laudantium, eaque, est, quod commodi tenetur repellat iusto reiciendis dolore consequuntur voluptate magni ratione omnis minima quibusdam illo vitae officia iure sapiente impedit animi corrupti labore odit qui voluptates beatae.</p>
        <h3>Heading 3</h3>
        <p>Dolore, fugiat quia consequuntur fuga laboriosam tempore! Dicta, sequi, voluptates sint corporis aliquam eligendi repellat. Optio, in, dolore, modi, voluptas tenetur vel reprehenderit numquam fugit unde labore quos doloremque aperiam.</p>
        <h4>Heading 4</h4>
        <p>Numquam, similique, cupiditate, eaque quam est accusamus molestias consectetur earum ea voluptatem ratione necessitatibus? Est, dolorem debitis officiis aliquid deleniti exercitationem aspernatur quo eos eligendi similique sapiente laboriosam vero voluptas.</p>
        <h5>Heading 5</h5>
        <p>Praesentium, ipsa beatae veritatis quasi laborum adipisci facere vel est repudiandae ipsum deleniti consequuntur recusandae aspernatur officia cumque tempora porro officiis amet nemo at! Dolor explicabo recusandae eum esse harum.</p>
        <h6>Heading 6</h6>
        <p>Facilis, atque in vitae voluptas illum ducimus qui dolor provident doloremque quibusdam delectus quasi autem nobis deleniti at consectetur ullam! Voluptas, officia, recusandae impedit unde atque illum quis nemo dolore.</p>
        <ul>
          <li>Lorem ipsum dolor sit amet.</li>
          <li>Sapiente, repellendus sunt sint suscipit.</li>
          <li>Cumque sint debitis aspernatur accusantium!</li>
          <li>Quisquam magni culpa molestiae ipsa!
          <ul>
          <li>Voluptatum neque a libero enim.</li>
          <li>Quisquam exercitationem modi distinctio veritatis?</li>
          <li>Adipisci aspernatur perferendis veniam illo.</li>
          <li>Placeat dolorem maiores rerum error!</li>
          </ul>
          </li>
          <li>Non hic quaerat corrupti quia.</li>
          <li>Distinctio dolor harum accusantium error.</li>
        </ul>
        <ol>
          <li>Lorem ipsum dolor sit amet.</li>
          <li>Id dolor harum neque eius!</li>
          <li>Quod soluta quam est temporibus.</li>
          <li>Minima ab perspiciatis sed possimus!</li>
          <li>Blanditiis, dicta mollitia quam modi.</li>
        </ol>
      </section>
      <section>
        <h2 class="section-title">Forms</h2>
        <form>
          <fieldset>
            <div class="form__group">
              <label for="first_name">First name</label>
              <input type="text" id="first_name" name="first_name">
            </div>
            <div class="form__group">
              <label for="first_name">Last name</label>
              <input type="text" id="last_name" name="last_name">
            </div>
            <div class="form__group">
              <label for="enquiry">Your enquiry</label>
              <textarea id="enquiry" name="enquiry"></textarea>
            </div>
            <div class="form__group">
              <label for="select_list">How did you hear about us?</label>
              <select id="select_list" name="select_list">
                <option>Search engine</option>
                <option>TV/radio advertising</option>
                <option>Magazine</option>
              </select>
            </div>
            <div class="form__group">
              <label>Which of these do you own?</label>
              <div class="form__group__controls">
                <label>
                  <input type="checkbox" name="own[]" value="xbox"> Xbox
                </label>
                <label>
                  <input type="checkbox" name="own[]" value="chair"> Chair
                </label>
                <label>
                  <input type="checkbox" name="own[]" value="pizza"> Pizza
                </label>
              </div>
            </div>
            <div class="form__group">
              <label>Gender</label>
              <div class="form__group__controls form__group__controls--inline">
                <label>
                  <input type="radio" name="gender" value="male"> Male
                </label>
                <label>
                  <input type="radio" name="gender" value="female"> Female
                </label>
                <label>
                  <input type="radio" name="gender" value="other"> Other
                </label>
              </div>
            </div>
            <div class="form__group">
              <button class="btn" type="submit">Submit</button>
              <a class="btn" href="#">Cancel</a>
            </div>
          </fieldset>
        </form>
      </section>
    </div>

<?php get_footer(); ?>
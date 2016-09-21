<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Superglobals | PHP Class</title>
        <meta name="description" content="How to use $_SERVER, $_GET, and $_POST superglobals.">
        <meta name="keywords" content="php, programming, byui, tutorial, guide, superglobal">
        <link href="/php-class/styles/fixie.css" type="text/css" rel="stylesheet" media="screen" />
        <meta name="author" content="Adam Quinton">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- VVV magic trick VVV  -->
      <?php 
        $background_color = 'white';
        if(strpos($_SERVER['QUERY_STRING'], 'monkey=') !== false)
        {
          $background_color = substr($_SERVER['QUERY_STRING'], 7);
        }
      ?>
      <style>
        body {
          background-color: <?php echo $background_color; ?>;
        }
      </style>
      <!-- end magic trick -->
    </head>
    <body>
      <div id="page">
        <main class="column1">
          <article>
            <h1 id="logo" title="howtoterminal.com">SUPERGLOBALS</h1>
            <p>Superglobals are variables available from <b>ALL</b> scopes and scripts.</p>
          Here is a list of superglobals:
            <ul>
              <li>$GLOBALS</li>  
              <li>$_SERVER</li>  
              <li>$_GET</li>  
              <li>$_POST</li>  
              <li>$_FILES</li>  
              <li>$_COOKIE</li>  
              <li>$_SESSION</li>  
              <li>$_REQUEST</li>  
              <li>$_ENV</li>  
            </ul>
          <h2>$_SERVER</h2>
          <p>With the $_SERVER superglobal you can get the following information from the server:</p>
            <ul>
              <li>Headers</li>  
              <li>Paths</li>  
              <li>Script locations</li>  
            </ul>
            
            <blockquote cite="http://php.net">“The entries in this array are created by the web server. There is no guarantee that every web server will provide any of these; servers may omit some, or provide others not listed here.” - php.net</blockquote>  
          <h3>Quiz</h3>
          Q: What does this do?<br/>
          <code>$_SERVER['PHP_SELF']</code>
          <div id="server-answer" style="display: none;">
            <p>A: Gets name of current script</p>
            <h4>Examples</h4>
            <h5>PHP_SELF</h5> 
            <p>Idea: (build navigation with current page highlighted)</p>
            <code>echo $_SERVER['PHP_SELF'];</code> =
            <code><?php echo $_SERVER['PHP_SELF']; ?></code>
            <h5>REMOTE_ADDR</h5> 
            <p>Idea: (log IPs or something)</p>
            <code>echo $_SERVER['REMOTE_ADDR'];</code> =
            <code><?php echo $_SERVER['REMOTE_ADDR']; ?></code>
            <h5>REQUEST_METHOD</h5>
            <p>Idea: (enforce or have different results based on method)</p>
            <code>echo $_SERVER['REQUEST_METHOD'];</code> =
            <code><?php echo $_SERVER['REQUEST_METHOD']; ?></code>
            <h5>QUERY_STRING</h5>
            <p>Idea: (get the query string)</p>
            <p>I dare you to add ?monkey=lime to the URL</p>
            <code>echo $_SERVER['QUERY_STRING'];</code> =
            <code><?php echo $_SERVER['QUERY_STRING']; ?></code>
            <h5>HTTP_ACCEPT</h5>
            <p>Ideas: see the language, browser version, etc.</p>
            <code>echo $_SERVER['HTTP_ACCEPT'];</code> =
            <code><?php echo $_SERVER['HTTP_ACCEPT']; ?></code>
        </div>
          <br/> 
          <button id="reveal-button-server" onclick="document.getElementById('server-answer').style.display='';this.setAttribute('disabled','');">Answer and Example</button>
        
          <h2>$_GET</h2>
          <p>With the $_GET superglobal you can get URL query parameters from the user.<br/>Benefits of GET method:</p>
          <ul>
            <li>Bookmarkable (state is in the URL)</li>
            <li>Easy for hackers to see user data (benefit if you're a hacker)</li>
          </ul>
          Benefits of $_GET superglobal:
          <ul>
            <li>Requires no parsing overhead (unlike $_SERVER['QUERY_STRING'])</li>
            <li>Follows Brother Robertson's advice of breaking up data (whereas $_SERVER['QUERY_STRING'] gets all in one chunk)</li>
          </ul>
          <strong>Security Warning:</strong> Make sure you put $_GET parameters through some type of sanitization.
          <h3>Quiz</h3>
          Q: What does this do?<br/>
          <code>$_GET["zip"]</code>
          <div id="get-answer" style="display: none;">
          <p>A: Returns value of query parameter named 'zip'</p>
          <h4>Example (this won't work until you add a query param named 'zip')</h4>
          <code>echo $_GET["zip"];</code> =
          <code><?php echo $_GET["zip"]; ?></code>
          </div>
          <br/> 
          <button id="reveal-button-get" onclick="document.getElementById('get-answer').style.display='';this.setAttribute('disabled','');">Answer and Example</button>
          
          <h2>$_POST</h2>
          When to Use:
          <ul>
            <li>Writing to database</li>
            <li>Executing request once (non-idempotent)</li>
            <li>Sensitive data being sent</li>
            <li>Non-bookmarkable</li>
            <li>Transfer more than 4KB</li>
          </ul>
          <p>More: Get Started with PHP and MySQL p.56</p>
          Example:
          <form action="post.php" method="post">
            Spirit Animal <input type="text" name="animal"><br>
            <input type="submit">
          </form>
            </article>
            <footer>
              <a href="https://docs.google.com/presentation/d/1L5FgS5rUtvyic7fU87eTLgYTQhlt4QD_-E5zHp8XkRU/edit?usp=sharing">Slides</a>
              <span id="timestampy"><?php echo 'Last updated: <time datetime="'. date('c') . '">' . date('F j, Y', getlastmod()) . '</time>'; ?></span>
            </footer>
            </main>
        </div>
    </body>
</html>

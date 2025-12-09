# Final-Project-Web-Group3
VERSION CONTROL RULES FOR PHASE 2 !Very Important!

<h2>Rule 1: Main branch = NEVER touch directly</h2>
<ol>
  <li>no committing directly to main</li>
  <li>only merge into main through PRs (Pull requests)</li>
</i>
</ol>
=><i>Ensures our project never breaks even after multiple updates

<h2>Rule 2: Each task = 1 branch</h2>
<b>Naming Rules: feature/ what-you-are-doing-branch</b>
<br>
Examples: <br>
<ul>
  <li>feature/login-ui</li>
  <li>feature/add-expense-function</li>
  <li>feature/add-food-item</li>
  <li>feature/delete-food-item</li>
  <li>feature/search-bar</li>
  <li>feature/update-index-php</li>
  <li>bugfix/date-format</li>
  <li>bugfix/sql-error</li>
  <li>style/navbar-update</li>
  <li>might get up to 20-50 branches... but IT IS EXPECTED AND HEALTHY PRACTICE</li>
</ul>
=>No one modifies the same files/content at the same time, from preventing merge conflicts <br>
=>Everyone can develop safely in parallel

<h2>Rule 3: Before coding each day: ALWAYS PULL MAIN</h2>
=>This ensures your branch is not outdated (when others updated something on main branch)

<h2>Rule 4: Work only inside your feature branch</h2>
You can freely do these in your <b>local branch</b>:
<ol>
  <li>commit</li>
  <li>test</li>
  <li>update files</li>
</ol>
BUT:
❌ Do NOT edit another developer’s feature work.
(Unless coordinated)

<h2>Rule 5-1: When done + push onto remote self-branch → Create a Pull Request (PR)</h2>
New Pull Request → Compare: feature branch → main
<br>
The PR allows:
<ol>
  <li>conflict checking</li>
  <li>teammate review</li>
  <li>discussion</li>
</ol>
=>Find out issues early

<h2>Rule 5-2: Merge PR into main</h2>
only merge if: <br>
<ul>
  <li>No conflicts</li>
  <li>Project runs successfully</li>
</ul>
After merging: <br>
branch becomes part of the official code <br>
teammate that merged this branch deletes the feature branch <br>

<h2>Rule 6: Everyone updates after a merge like Rule 3</h2>
ONLY THEN continue working (Never continue working on an outdated branch. <br>
OR ELSE Outdated branch will cause <b>merge conflicts</b> (not scary but troublesome) 




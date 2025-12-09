# VERSION CONTROL RULES FOR PHASE 2 (VERY IMPORTANT)
<p>Jordan here~ I hope everyone read this thoroughly so that we all are in the same page and it will 100% clear our confusion from phase 1</p>

<h2>Rule 1: Main branch = NEVER touch directly</h2>
<ol>
  <li>no committing directly to main</li>
  <li>only merge into main through PRs (Pull requests)</li>
</i>
</ol>
<p>=><i>Ensures our project never breaks even after multiple updates</i></p>

<h2>Rule 2: Each task = 1 branch</h2>
<p>Analogy: Think of branch as a task, multiple task = task checklist</p>
<p><b>Naming Rules: feature/ what-you-are-doing-branch/teammate name</b></p>
<br>
Examples: <br>
<ul>
  <li>feature/login-ui/jordan</li>
  <li>feature/add-expense-function/eric</li>
  <li>feature/add-food-item/eli</li>
  <li>feature/delete-food-item/cia</li>
  <li>feature/search-bar/eric</li>
  <li>feature/update-index-php/jordan</li>
  <li>bugfix/date-format/cia</li>
  <li>bugfix/sql-error/jordan</li>
  <li>style/navbar-update/stef</li>
  <li>might get up to 20-50 branches... but IT IS EXPECTED AND HEALTHY PRACTICE</li>
</ul>
<p>
  =>No one modifies the same files/content at the same time, from preventing merge conflicts <br>
  =>Everyone can develop safely in parallel
</p>


<h2>Rule 3: Before coding each day/each merge update in main: ALWAYS PULL MAIN</h2>
<p>=>This ensures your branch is not outdated (when others updated something on main branch)</p>

<h2>Rule 4: Work only inside your feature branch</h2>
You can freely do these in your <b>local branch</b>:
<ol>
  <li>commit</li>
  <li>test</li>
  <li>update files</li>
</ol>
<p>BUT:
❌ Do NOT edit another teammate’s feature work, this will cause merge conflict!
(Unless coordinated)</p>

<h2>Rule 5-1: When done + push onto remote self-branch → Create a Pull Request (PR)</h2>
New Pull Request → Compare: feature branch → main
<br>
The PR allows:
<ol>
  <li>conflict checking</li>
  <li>teammate review</li>
  <li>discussion</li>
</ol>
<p>=>Find out issues early</p>

<h2>Rule 5-2: Merge PR into main</h2>
only merge if: <br>
<ul>
  <li>No conflicts</li>
  <li>Project runs successfully</li>
</ul>
<p>
  After merging: <br>
  branch becomes part of the official code <br>
  teammate that merged this branch deletes the feature branch <br>
</p>


<h2>Rule 6: Everyone updates after a merge like Rule 3</h2>
<P>ONLY THEN continue working (Never continue working on an outdated branch. <br>
OR ELSE Outdated branch will cause <b>merge conflicts</b> (not scary but troublesome) </P>


<h2>Rule 7: Happy coding guys! </h2>



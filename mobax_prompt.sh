# Powerline-style prompt: date | time | directory
# Needs a Nerd Font or Powerline font so \ue0b0 renders as a solid chevron.
# In MobaXterm: Settings → Terminal → Font → pick a Nerd Font (or Cascadia/DejaVu if the chevron shows as a box, use the fallback below).

__mobax_prompt() {
  local r0=$?

  local date_fg=33       # blue
  local time_fg=37       # teal
  local user_fg=46       # green
  local msys_fg=201      # magenta
  local path_fg=220      # gold
  local git_fg=203       # red
  local leaf_fg=51       # cyan
  local paren_fg=245     # grey
  local bg=0

  local d t p branch parent leaf
  d=$(date '+%d/%m/%Y')
  t=$(date '+%H:%M.%S')
  p=$PWD
  branch=$(git rev-parse --abbrev-ref HEAD 2>/dev/null)
  leaf=$(basename -- "$p")
  parent=$(dirname -- "$p")

  if [ "${NP:-8}" != "0" ]; then
    if [ "$r0" = 0 ]; then
      builtin echo -ne "\e[$((COLUMNS-1))C\e[1;32m\e(0d\e(B\e[0m\n"
    else
      builtin echo -ne "\e[$((COLUMNS-1))C\e[31m\e(0e\e(B\e[0m\n"
    fi
  else
    unset NP
  fi
  history -a

  PS1=""
  [ ${#PWD} -gt $((COLUMNS-60)) ] && PS1+="\n"
  PS1+="\[\e[48;5;${bg};38;5;${paren_fg}m\](\[\e[38;5;${date_fg}m\]${d} \[\e[38;5;${time_fg}m\]${t}\[\e[38;5;${paren_fg}m\])\n"
  PS1+="\[\e[38;5;${user_fg}m\]${USER}@${HOSTNAME%%.*} "

  if [[ -n ${MSYSTEM:-} ]]; then
    PS1+="\[\e[38;5;${msys_fg}m\]${MSYSTEM} "
  fi

  PS1+="\[\e[38;5;${path_fg}m\]"
  if [[ -n $branch && $parent != "$p" ]]; then
    PS1+="${parent}/\[\e[38;5;${leaf_fg}m\]${leaf}"
  else
    PS1+="${p}"
  fi

  if [[ -n $branch ]]; then
    PS1+=" \[\e[38;5;${git_fg}m\](${branch})"
  fi
  PS1+="\[\e[0m\]\n$ "
}

PROMPT_COMMAND=__mobax_prompt

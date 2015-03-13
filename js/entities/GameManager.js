game.GameTimerManager = Object.extend({
    init: function (x, y, settings){
        this.now = new Date().getTime();
        this.lastCreep = new Date().getTime();
        this.pause = false;
        this.alwaysUpdate = true;
    },
    
    update: function(){
        this.now = new Date().getTime();
        //this will check if my character is dead 
        this.goldTimerCheck();
        this.creepTimerCheck();
        
        return true;
    },
    
    goldTimerCheck: function(){
    if(Math.round(this.now/1000)%20 ===0 && (this.now - this.lastCreep >= 1000)){
            game.data.gold += (game.data.exp1 + 1);
        }
    },
    
    creepTimerCheck: function (){
        if(Math.round(this.now/1000)%10 ===0 && (this.now - this.lastCreep >= 1000)){
            this.lastCreep = this.now;
            var creepe = me.pool.pull("EnemyCreep", 1000, 0, {});
            me.game.world.addChild(creepe, 5);
        }
    }
});

game.HeroDeathManager = Object.extend({
    init: function(x, y, settings){
        this.alwaysUpdate = true;
    },
    
    update: function(){
        if(game.data.player.dead){
            me.game.world.removeChild(game.data.player);
            me.state.current().resetPlayer(10,0);
        }
        
        return true;
    }
});

game.ExperienceManager = Object.extend({
  init: function(){
      this.alwaysUpdate = true;
      this.gamevoer = true;
  },
  
  update: function(){
      if(game.data.win === true && !this.gameover){
        this.gameOver(true);
      }else if(game.data.win === false && !this.gameover){
        this.gameOver(false);
      }
      
      return true;
  },
  
  gameOver: function(win){
        if(win){
            game.data.exp += 10;
        }else{
            game.data.exp += 1;   
        }
        this.gameover = true;
        me.save.exp = game.data.exp;
  }
});
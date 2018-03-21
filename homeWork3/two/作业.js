	var myInfo = function() {
    	var name = 'wang';
    	function _age() {
    		console.log('1000');
    	}
    	function _doing() {
    		console.log('??');
    	}

    	function showName() {
    		console.log(name);
    	}
    	return {
    		name : name,
    		show : function() {
    			_age();
    			_doing();
    		},
    		changeName : function(newname) {
    			name = newname;
    			showName();
    		}
    	}
    }

    info = myInfo();
    info.show();
    info.changeName('trn');
    console.log(info.name);
	
	//�������nameû�б仯


    function animal() {
    		this.name = 'animal';
    }

    animal.prototype.run = function()
    {
    		console.log('run');
    }

    function Bird(){
    		this.name = 'bird';
    }
    Bird.prototype.fly = function()
    {
    		console.log('fly');
    }
    Bird.prototype = new animal(); //extends animal

    function Crow() {
    		this.name = "crow";
    }
    Bird.prototype.Crow = function()
    {
    		console.log('drink');
    }
    Crow.prototype = new Bird();//extends Bird

    var crow = new Crow();
    crow.run();
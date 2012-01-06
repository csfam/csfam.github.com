---
author: timofei7
date: '2010-06-08 01:21:36'
layout: post
slug: a-paper-the-neural-mechanisms-and-purposes-of-randomness-in-consciousness
status: publish
title: 'a paper: The Neural Mechanisms and Purposes of Randomness in Consciousness'
categories:
- Writing
tags:
- brain
- randomness
comments: true
sharing: true 

---

Do you believe in free will or determinism?   Either way,  imagine you are
creating a life form, and that you want it to have free will.  You figure out
that you need to design an organ that would be responsible for this.  You
decide to call it the "free willer".

What would this organ do? You realize that it must make decisions, as that is
what "will" allows you to do.  But how will it do so?  You realize that
learning is involved -- that this organ needs to take into consideration past
events. Oops, you have just created the deterministic willer!

Ok ok, let's back up a minute.  If we don't take into consideration past
events... well then the decisions it would make would have to be random.  Is
that what we want? Not really, random decisions won't get this new life form
very far!

What other decision mechanisms could we come up with for this organ?  Well it
could be influenced by some predetermined set of rules or genes that get
better over time, but that's just another determinism!

Ideally what we want is something that is influenced by past events
(learning). Something that can improve its programming over generations
(genes). And finally something that can decide to do OTHER than its
deterministic inputs dictate (the free part).

Turns out that the brain marries randomness with learning and genes in a
perfect way to achieve just this!  We already have an organ that will
purposefully introduce randomness into our thinking process so that we can
come up with unique solutions and choices that are not predetermined by the
universe or by our genes and past experiences (at least not exclusively).

Here's a paper I wrote about this that goes into this in more detail.  The
brain is sooo cool.

<!--more-->

**AI Randomness **  
The field of computer artificial intelligence often finds algorithms that use
randomness extremely useful. Simulated annealing, genetic algorithms, random
walk, stochastic algorithms and neural networks, cryptography, random
constraint satisfaction, and even the common quicksort all employ randomness
to some degree or another (Russel, S. J., Norvig, P., 2003). Randomness is
often used to get an algorithm unstuck or to allow an algorithm to find an
approximate solution much quicker than it would take to find an optimal one
(finding the optimal solution in large state spaces is very often simply not
computationally feasible).

For instance, in simulated annealing a local search algorithm will randomly
choose among nearby solutions in an effort to prevent getting stuck at a local
optimum (ibid., pg 120). A local search algorithm is an algorithm that changes
the current state (or states) based on information it knows about surrounding
states rather than exhaustively searching down paths from a start state. A
simple example of this is the hill climbing algorithm (ibid., pg.122). The
algorithm simply examines positions in the search space adjacent to it's
current position and picks the better one. When nothing adjacent is better it
stops. However, stopping at this point does not necessarily imply the best
solution: this might be the top of a small hill that is next to a big
mountain. To make this algorithm not get stuck at local maxima, whenever it
gets to the top (since we are talking about climbing), instead of claiming
victory it should attempt a random jump to another location, but remember the
last highest peak. This way after some number of maximum random jumps the
algorithm will either find the global optimal or the best it could find in the
given time. The physics annealing analog is repeatedly heating a metal (to
progressively less high temperatures) and allowing to cool in between cycles
to align the crystalline structure into continually smaller-finer crystals.
Thus instead of simply randomly jumping the algorithm could assign a lowering
probability for each step as it jumps to avoid jumping too far as it narrows
in on the actual optimum (ibid., pg 124).

Genetic algorithms (and stochastic beam search on which they are based) can be
explained in terms of evolution. In stochastic beam search a greedy local
search such as hillclimbing is run some n number of times in parallel. At each
step, n of the best possible successors are chosen at random with a decreasing
probability assigned to each given its value (provided by some heuristic value
function) and the current time step. The biological analogy to this is natural
selection. Each successor state is an offspring of a parent state organism and
the successors are selected based on their fitness. Genetic algorithms take
this a step further by combining two parent states analogously to sexual
reproduction. They are similar to stochastic beam search except with the
addition of a few steps that deal with crossing the 'genes' of the parent
states. States are usually stored as sequences of characters or numbers and
after being crossed are also randomly mutated.

These are just a few examples of randomness in AI computing. These are fairly
simple examples however, a larger problem for AI is what to do when the world
is complex and uncertain. Simulated annealing and stochastic beam search are
part of the Monte Carlo family of algorithms that use randomness to help deal
with uncertainty in large numbers of inputs. Any large scale modeling with
uncertain inputs requires probabilistic reasoning which often requires
randomness to deal with any sort of large connected network (ibid., 530).

In these algorithms, randomness plays a part, however the other essential part
is probability. Without probabilistic reasoning, no complex modeling, learning
or planning given uncertain inputs could be possible (ibid., 480). Bayesian
networks are perhaps the most famous of probabilistic tools used to compute
the probabilities of unknown variables using networks of connected
probabilities. At the neuronal level in the physical brain probability plays a
big role. The research areas most clearly connecting AI to the human brain are
artificial neural networks.

Artificial neural networks can have a fairly simple mathematical model. A
neural network is composed of units connected to each other. Each connection
has a weight which not only carries the 'strength' of the connection but also
whether it is excitatory or inhibitory (the numerical weight is signed). Each
node has inputs (which are summed), an activation function (either a hard
threshold or a sigmoid) and output links to other nodes (ibid., 728). After
training, an artificial neural network can not only encode complex boolean
operations but also can function as short term memory (if connected as a
recurrent network with reafferent loops). The significance of this model is
that although it is quite simplified, it shows a probabilistic network
analogous to the neural network of the cortex.

**Probabilistic Neurons**  
Since the brain's neuronal circuitry is the basis for artificial neural
networks, there are clear parallels even though the actual system is much more
complicated than the computational model. The weights can be conveyed not only
by width of the synaptic gap (usually around one forty-thousandth of a
millimeter (Penrose, R., 1989)) but more importantly by the timing of the
axonal pulses (Freeman, W. J., 2000, pg. 41). The presynaptic electrical
axonal pulse has a constant current height and so the strength of the signal
is conveyed by the rate of the pulses. The dendrite of the postsynaptic neuron
(via the action of neurotransmitters in the synaptic cleft) integrates these
pulses into a amplitude modulated wave input for the postsynaptic neuron. The
various currents from the dendrites on the postsynaptic neuron are summed up
in the trigger zone near the nucleus of the neuron. That current is what
triggers the neuron and is capable of being measured as potential in an
electroencephalogram (EEG) (ibid., pg. 42). If the current reaches the action
potential then the neuron will trigger it's own axonal pulses. The axonal
pulses take some time to travel but there is no attenuation of the signal --
this is essential to be able to transmit values over long distances without
losing energy. Dendrite current modulation is different -- it is able to
integrate with currents from other dendrites in the cell body current loop.
This enables the summing of potentials (ibid., pg. 46). One thing to note
about the pulse-width conversion (ibid, pg. 46) is that it is not stepped or
linear but rather sigmoid (leaning s) shaped. Slow at low and high activation
but increasing linearly in the middle. By this action the neuron reacts
differently to incoming pulses given its current state.

Some neurons have leaky terminal membranes allowing a slow change in potential
(Burns, B.D, 1968, pg. 23) . This causes them to fire at random intervals.
Taken alone this periodic random firing does not amount to much, however given
the density of neuronal connections, it is useful to also consider the action
of groups of neurons rather than single individuals. A noticeable group effect
that occurs is subthreshold oscillation. For each neuron to stay alive it
needs to periodically activate (Freeman, W. J., 2000, pg. 41). There appear to
be synchronization waves that result in periodic rises in subthreshold
membrane neuron potential. These result from a collective pattern of recurrent
excitation and inhibition from interneurons (shorter local reach neurons
(ibid., pg 39) (Buzsaki, G., 2006). Not every neuron fires every time but
collectively there is an oscillation pattern. This oscillation constrains the
times during which neurons may fire and thus produces a synchronizing effect
(Buzsaki, G., 2006, pg. 76). Neuronal firing often needs to be synchronized to
produce the desired effect -- if two neurons fire and if, because of the
oscillation, the probability that they will fire simultaneously is increased,
they are more likely to push a third neuron over it's activation threshold. If
the neural process is widely distributed and complex then the synchronicity
becomes even more important in it's constraint of timing differences because
of distance (ibid., pg. 115). There are several different oscillation
frequencies ranging from multiple seconds to 600hz. Since they temporally
constrain neural firing the different frequencies have different
purposes/ranges. Fast oscillation is more appropriate for local, small
distance neural patterns whereas slower clock speeds allow neurons further
apart to cooperate. Additionally the oscillations are not constant, they are
perpetually attracting and repelling each other as they do not have any stable
phase relationship. Thus, they interfere with each other, but that chaos and
fluctuation may be a necessary part of the temporal organization of the brain
as a whole. All of this oscillation can be seen as noise, not only because the
neurons are firing without any external stimuli but also because the
relationship between all the different oscillation frequencies is _e_ (2.71),
the natural logarithm -- this results in a chaotic pattern that appears like
"pink" noise on an EEG (ibid., pg. 113). "Pink" noise is also known as complex
noise -- this is because its power ratio is 1/_f_, meaning that the amplitude
of the waves decreases as the frequency increases. Although to a physicist
this would simply suggest that it is a noisy system, what appears as noise is
also a chaotic yet functional synchronizer and organizer of neuron systems
(ibid., 119). The same neurons participate in multiple rhythms, and the
oscillating groups can change and influence each other.

> The brain not only gives rise to large-scale, long-term patterns, but these
self-organized collective patterns also govern the behavior of its constituent
neurons. The firing patterns of single cells depend not only on their
instantaneous external inputs but also on the history of their firing patterns
and the state of the network into which they are embedded (Buzsaki, G., 2006,
pg 122).

However, these collective patterns are transient, they fluctuate around
different brain areas, organizing temporal information where needed on
specific time-scales depending on how large of a neuronal pattern is needed.
"Transient order emerges from halfway between order and disorder from the
territory of complexity" (ibid., pg 135).

It turns out that the power ratio of the pink noise also happens to fit the
data for other time-related brain tasks: forgetting, habituation, music and
speech. The brain is not competing with its own noise, it is in essence
harnessing the noise as multiple dynamic timing devices synchronizing
particular groups of neurons for specific tasks at specific clock rates.
Indeed because of this very action, and the fact that neurons are strongly
interconnected (some pyramidal cells can have thousands of dendrite
connections sites (Buzsaki, G., 2006, pg. 32)), even small local perturbations
can become amplified and spread throughout the network.

This amplification is of great importance. Consider a neuron that is almost
ready to fire, but does not quite have enough current to reach it's action
potential. A noise input could cause it to fire when it otherwise would not
have. Because the noise is stochastic, the neuron's firing is not
deterministic. It may or may not fire depending on the noise in the system
around it. Small weak local signals can become noticeable when the noise bumps
it up. Additionally small periodic signals can act as attractors to the noise
oscillation and can in effect draw attention to themselves by pulling the
oscillation frequency toward their own.

Given these mechanisms it is evident that neuronal firing is probabilistic.
Even sensory neurons such as the ganglion cells in the retina have been shown
to have unpredictable responses (Burns, B.D, 1968, pg 28). This behavior is of
interest because it allows for a break with deterministic, simple input-output
machine operation and allows a greater uncertainty to exist.

**Brownian Motion**  
Another source of uncertainty in the brain could be brownian motion. Brownian
motion is the basis for brownian noise. Brownian noise is also called random
walk noise and has a power density ratio of 1/_f_ 2 (Buzsaki, G., 2006, pg.
121). It gets its name from brownian motion. Brownian motion was originally
discovered by Robert Brown, a biologist, who noticed that particles of pollen
on the surface of water will move around erratically (Nelson, E., 1967, pg.
11). The concept was later further worked on by Einstein who in part used it
to prove the existence of atoms. The basic idea is that a larger particle
surrounded by a myriad of smaller particles suspended in a liquid or gas that
all have their own movement will be pushed around by the motion of the smaller
particles in a random fashion. Brownian motion over longer periods/distances
is random, but can be predicted at short intervals by the average velocity and
density of the molecules in the suspension (Buzsaki, G., 2006, pg. 121). It
has been shown that brownian motion applies to all biological systems, "as a
result of thermal agitation processes, molecules are constantly on the move,
colliding with each other and bouncing back and forth" (Marguet, D., Lenne,
PF., Rigneault, H., He, HT., 2006, pg. 288). On a macroscopic level however
brownian motion is a diffusion process.

> Diffusion processes have the following main features:  (1) the diffusion
rates are temperature-depen- dent, (2) as collisions with other molecules slow
down diffusion processes, the higher the molecular density of a medium is, the
lower the diffusion rate will be and most importantly, (3) as the random
forces generated by collisions have no preferred direction, diffusion will
cause a tendency towards homogeneity. (ibid., pg. 288)

Marguet et al suggest that any variability in activation of the postsynaptic
neuron would be due purely to "stochastic variations in basic presynaptic
elements, such as the vesicle volume, the vesicle docking position, and the
vesicle neurotransmitter concentration" (ibid., pg. 298) rather than any
variability due to brownian motion. So although brownian motion is used as a
diffusion process and is certainly harnessed by the brain to effect homogenous
dispersal of neurotransmitters in the synaptic cleft, it is not responsible
directly for any variability in actual neuronal firing.

**Quantum Theories**  
There are many theories involving consciousness and quantum theory. The
problems with these theories is that the brain is too hot to be susceptible to
any currently known quantum effects. There is too much classical noise and
complexity for a single quanta to have any effect at all. A single cell in the
retina may react to a single photon (which would be a quantum event) however
our brains need at least seven neurons to react to actually perceive it
(Penrose, R, 1989, pg. 516). Additionally, most neurons in the brain require
many neurotransmitters to trigger many sodium or chloride channels to open
which in turn could trigger the neuron to fire. This would require too many
quanta to be useful. However, theories abound of either undiscovered cells
that respond to single quanta or computational complexity that can only be
solved by quantum computation. Additionally there are dualist theories that a
mental energy influences the physical brain through quantum effects. These
theories attempt to escape from determinism and provide a explanation why free
will is non-determined. Christoff Koch (2006) provides an eloquent rebuttal of
quantum theories, for now at least:

> The content of consciousness is rich and highly differentiated. It is
associated with the firing activity of a very large number of neurons spread
all over the cortex and associated satellites, such as the thalamus. Thus, any
one conscious percept or thought must be expressed in a wide- flung coalition
of neurons firing together. Even if quantum gates exist within the confines of
neurons, it remains totally nebulous how information of relevance to the
organism would get to these quantum gates. Moreover, how would it be kept
coherent across the milli- and centimeters separating individual neurons when
synaptic and spiking processes, the primary means of neuronal communication
on the perceptual timescale, destroy quantum information?

It is far more likely that the material basis of consciousness can be
understood within a purely neurobiological framework, without invoking any
quantum-mechanical deus ex machina. (Koch, C., 2006).

**Consciousness**  
How do these various theories relate to consciousness? Randomness can be, at
least partially, an escape from determinism. If every neuron firing were
physically determined then there is no way that we as as 'free agent' could
have chosen differently from how we did choose. This breaks a mandate of 'free
will': we are free to have chosen differently from how we did choose. However,
going too far toward randomness would break the other mandate of 'free will':
our actions belong to us and reflect who we are (and that our actions are not
simply random). A middle ground would surprisingly satisfy both of these
criteria and allow a free will that is both based on our past experiences but
is not tied down to them deterministically. If the system is probabilistic,
then at any point we can say both, "I could have done differently," and "I
chose that way based on my past experiences, based on who I am." At least
semantically this fulfills the requirements of free will. Additionally, it is
hard to imagine what third rule would invalidate this solution and would at
the same time define the concept of free will in such a way as to keep the
common intuition of what it is. Wegner in "The Illusion of Conscious Will"
poses a thought experiment of inventing a Free Willer -- an organ that makes
free will choices. Such an instrument cannot ignore past experiences as that
would be meaningless, and it cannot be purely random as that is equally
meaningless. How do the various sources and types of randomness affect the
free will problem?

AI randomness is an example of how randomness is useful purely
computationally. AI algorithms attempt, at least in part, to make sense of a
complex uncertain world and to make internal models of it and for this they
need randomness. This does not imply that the human brain requires randomness
in the same way however.

The probabilistic nature of neuronal firing and the noise of oscillation
appears very promising however. Not only is a neuron not guaranteed to fire
when presented with some stimuli, but it may also fire randomly when presented
with stimuli that should be too weak. This creates an instability in the
system allowing alternative solutions and unpredictable effects. Rodolfo
Llinas (2003) goes even further to claim that conscious experience is created
by the temporal organization provided by oscillatory synchronization.

Quantum effects could provide a very interesting source of uncertainty in the
brain, but unfortunately there is no current reason to think that that it
does.

**Conclusions**  
It appears from this summary of some of the primary randomness theories that
indeed there are some sources of randomness in the brain. However, not all of
these sources are useful for a discussion of consciousness. For instance, no
solid proof exists for quantum effects in the brain. Brownian motion in the
synapse is useful for diffusion but not specifically for volition or free
will. However oscillation and pink noise provide an interesting systemic
effect that should not be overlooked. If this noise is truly stochastic and
unpredictable enough it provides a middle ground between the two opposites of
randomness and determinism and allow us to feel that our decisions are our
own. 
________________

**References:** Burns, B. D. (1968). The uncertain nervous system. London: Arnold.  
Buzsáki, G. (2006). Rhythms of the brain. Oxford; New York: Oxford University
Press.

Freeman, A., Libet, B., & Sutherland, K. (1999). The volitional brain :Towards
a neuroscience of free will. Thorverton: Imprint Academic.

Freeman, W. J. (2000; 1999). How brains make up their minds. New York:
Columbia University Press.

Hutcheon, B., & Yarom, Y. (2000). Resonance, oscillation and the intrinsic
frequency preferences of neurons. Trends in Neurosciences, 23(5), 216-222.
doi:DOI: 10.1016/S0166-2236(00)01547-2

Koch, C., & Hepp, K. (2006). Quantum mechanics in the brain. Nature,
440(7084), 611-611. Retrieved from http://dx.doi.org/10.1038/440611a

Llinás, R. (2003). Consciousness and the thalamocortical loop. International
Congress Series, 1250, 409-416. doi:DOI: 10.1016/S0531-5131(03)01067-7

Marguet, D., Lenne, P., Rigneault, H., & He, H. (2006). Dynamics in the plasma
membrane: How to combine fluidity and order. The EMBO Journal, 25(15),
3446-3457. Retrieved fromhttp://dx.doi.org/10.1038/sj.emboj.7601204

Nelson, E. (1967). Dynamical theories of brownian motion. Princeton, N.J.:
Princeton University Press.

Osaka, N. (2003). Neural basis of consciousness. Philadelphia, PA: John
Benjamins Pub.

Penrose, R. (1989). The emperor's new mind :Concerning computers, minds, and
the laws of physics. Oxford; New York: Oxford University Press.

Russell, S. J., & Norvig, P. (2003). Artificial intelligence :A modern
approach (2nd ed.). Upper Saddle River, N.J.: Prentice Hall/Pearson Education.

Ventriglia, F., & Di Maio, V. (2002). Stochastic fluctuations of the synaptic
function. Biosystems, 67(1-3), 287-294. doi:DOI: 10.1016/S0303-2647(02)00086-2


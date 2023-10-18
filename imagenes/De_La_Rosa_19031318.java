package net.letskit.redbook.first;
import net.letskit.redbook.glskeleton;

import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

import javax.media.opengl.*;
import javax.media.opengl.glu.*;
import com.sun.opengl.util.*;

import javax.media.opengl.GLEventListener;

/**
 * This is a simple double buffered program. Pressing the left mouse button
 * rotates the rectangle. Pressing the middle mouse button stops the rotation.
 *
 * @author Kiet Le (Java conversion)
 */
public class De_La_Rosa_19031318//
        extends glskeleton//
        implements //
        GLEventListener//
        , KeyListener//
        , MouseListener//
{
    private float spin = 8f, spinDelta = 0f;
    
    public De_La_Rosa_19031318() {
    }
    
    public static void main(String[] args) {
        GLCapabilities caps = new GLCapabilities();
        caps.setDoubleBuffered(true);
        GLJPanel canvas = new GLJPanel(caps);
        De_La_Rosa_19031318 demo = new De_La_Rosa_19031318();
        demo.setCanvas(canvas);
        canvas.addGLEventListener(demo);
        demo.setDefaultListeners(demo);

        demo.setDefaultAnimator(24);

        JFrame frame = new JFrame("De_La_Rosa_19031318");
        frame.setSize(512, 512);
        frame.setLocationRelativeTo(null);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        frame.getContentPane().add(canvas);
        frame.setVisible(true);
        canvas.requestFocusInWindow();
        demo.animate();
    }

    public void init(GLAutoDrawable drawable) {
        GL gl = drawable.getGL();
        gl.glClearColor(0.0f, 0.0f, 0.0f, 0.0f);
        gl.glShadeModel(GL.GL_SMOOTH);
    }

    public synchronized void display(GLAutoDrawable drawable) {
        GL gl = drawable.getGL();
        gl.glClear(GL.GL_COLOR_BUFFER_BIT);
        gl.glPushMatrix();
        gl.glRotatef(spin, .5f, 1.0f, .0f);
      
        float sqrt2 = (float) Math.sqrt(2);
        float a = 1.0f / sqrt2;
        float b = 1.0f / (2 * sqrt2);

        gl.glBegin(GL.GL_TRIANGLES);
        gl.glColor3f(1.0f, 0.0f, 1.0f); 
        gl.glVertex3f(0, 1, 0);
        gl.glVertex3f(-a, 0, -a);
        gl.glVertex3f(a, 0, -a);

        gl.glColor3f(0.0f, 1.0f, .0f); 
        gl.glVertex3f(0, 1, 0);
        gl.glVertex3f(a, 0, -a);
        gl.glVertex3f(a, 0, a);

        gl.glColor3f(0.0f, 0.0f, 1.0f); 
        gl.glVertex3f(0, 1, 0);
        gl.glVertex3f(a, 0, a);
        gl.glVertex3f(-a, 0, a);

        gl.glColor3f(1.0f, 1.0f, 0.0f); 
        gl.glVertex3f(0, 1, 0);
        gl.glVertex3f(-a, 0, a);
        gl.glVertex3f(-a, 0, -a);

        gl.glColor3f(1.0f, 0.0f, 1.0f);  
        gl.glVertex3f(0, -1, 0);
        gl.glVertex3f(-a, 0, -a);
        gl.glVertex3f(a, 0, -a);

        gl.glColor3f(0.0f, 1.0f, 1.0f);  
        gl.glVertex3f(0, -1, 0);
        gl.glVertex3f(a, 0, -a);
        gl.glVertex3f(a, 0, a);

        gl.glColor3f(1.0f, 0.5f, 0.0f);  
        gl.glVertex3f(0, -1, 0);
        gl.glVertex3f(a, 0, a);
        gl.glVertex3f(-a, 0, a);

        gl.glColor3f(0.5f, 0.0f, 1.0f);  
        gl.glVertex3f(0, -1, 0);
        gl.glVertex3f(-a, 0, a);
        gl.glVertex3f(-a, 0, -a);
        gl.glEnd();

        gl.glPopMatrix();
        gl.glFlush();

        spinDisplay();
    }

    public void reshape(GLAutoDrawable drawable, int x, int y, int w, int h) {
        GL gl = drawable.getGL();
        gl.glViewport(0, 0, w, h);
        gl.glMatrixMode(GL.GL_PROJECTION);
        gl.glLoadIdentity();
        float aspect = (float) h / (float) w;
        gl.glOrtho(-1.5, 1.5, -1.5 * aspect, 1.5 * aspect, -1.5, 1.5);
        gl.glMatrixMode(GL.GL_MODELVIEW);
        gl.glLoadIdentity();
    }

    public void displayChanged(GLAutoDrawable drawable, boolean modeChanged, boolean deviceChanged) {
    }

    private void spinDisplay() {
        spin = spin + spinDelta;
        if (spin > 360f) spin = spin - 360;
    }

    public void keyTyped(KeyEvent key) {
    }

    public void keyPressed(KeyEvent key) {
        switch (key.getKeyCode()) {
            case KeyEvent.VK_ESCAPE:
                super.runExit();
            default:
                break;
        }
    }

    public void keyReleased(KeyEvent key) {
    }

    public void mouseClicked(MouseEvent key) {
    }

    public void mousePressed(MouseEvent mouse) {
        switch (mouse.getButton()) {
            case MouseEvent.BUTTON1:
                spinDelta = 2.5f;
                break;
            case MouseEvent.BUTTON2:
            case MouseEvent.BUTTON3:
                spinDelta = 0f;
                break;
        }
        super.refresh();
    }

    public void mouseReleased(MouseEvent mouse) {
    }

    public void mouseEntered(MouseEvent mouse) {
    }

 public void mouseExited(MouseEvent mouse) {
    }
}